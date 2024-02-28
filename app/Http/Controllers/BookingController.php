<?php

namespace App\Http\Controllers;

use App\Mail\PasswordMail;
use App\Models\User;
use App\Services\AirportService;
use App\Services\OrderDataService;
use App\Services\UserDataService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;


class BookingController extends Controller
{
    public function index()
    {
        $request_all=\request()->all();
        $request=json_decode($request_all['request']);
        $result=json_decode($request_all['result']);

        $airportService = new AirportService();
        $dataService = new OrderDataService();
        $passengersService = new UserDataService();

        $airports = $airportService->getAllAirports();
        $airports=collect($airports);


        $cookie=$dataService->set_data($request, $result);

        if($cookie!=null)
        {
            setcookie('order',$cookie);
            $cookie=json_decode($cookie);


            $adults=$passengersService->define_passengers_array($cookie->passengers->adults, 'взрослый');
            $children=$passengersService->define_passengers_array($cookie->passengers->children, 'ребенок');
            $infants=$passengersService->define_passengers_array($cookie->passengers->infants, 'младенец');

            //return view('booking.index', compact(['cookie', 'airports', 'adults', 'children', 'infants']));
            return redirect()->route('booking.get');
        }
        else
        return redirect()->route('main.index');
    }

    public function get()
    {
        if(isset($_COOKIE['order']))
        {
            $dataService = new OrderDataService();
            $airportService = new AirportService();
            $passengersService = new UserDataService();


            $cookie=$dataService->get_data();

            $adults=$passengersService->define_passengers_array($cookie->passengers->adults, 'взрослый');
            $children=$passengersService->define_passengers_array($cookie->passengers->children, 'ребенок');
            $infants=$passengersService->define_passengers_array($cookie->passengers->infants, 'младенец');

            //dd($adults);

            $airports = $airportService->getAllAirports();
            $airports=collect($airports);

            return view('booking.index', compact(['cookie', 'airports', 'adults', 'children', 'infants']));
        }
        return redirect()->route('main.index');
    }

    public function pay_page_post()
    {
        $dataService = new OrderDataService();

        if($_COOKIE['order']!=null)
        {
            if(auth()->user()==null)
            {
                $is_registered=User::query()->where('email','=', request()->email)->exists();
                if($is_registered)
                {
                    return redirect()->back()->with('error','true');
                }
                else
                {
                    $password=Str::random(8);
                    if(Session::get('ref_id')==null)
                    {
                        $user =User::create([
                            'name' => request()->user[1]['name'],
                            'email' => request()->email,
                            'password' => Hash::make($password),
                            'is_partner' => false,
                        ]);
                    }
                    else
                    {
                        $user =User::create([
                            'name' => request()->user[1]['name'],
                            'email' => request()->email,
                            'password' => Hash::make($password),
                            'ref_id' => Session::get('ref_id'),
                            'is_partner' => false,
                        ]);
                    }

                    if($user->email!=null)
                        Mail::to(request()->email)->send(new PasswordMail($password));

                    auth()->login($user);
                }
            }

                $cookie=$dataService->update_data(\request()->all());
                setcookie('order',json_encode($cookie));

            $API=
                [
                    'API_Key'=>'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1dWlkIjoiTVRRNU1UQT0iLCJ0eXBlIjoicHJvamVjdCIsInYiOiIyMTc2YjlmYzUxZGRjMjVkNzA2OGUzOWVjN2JjOTIxMTlhYjI1YjkwZTRiMDYxNzk4ZGQ0ZWE4ZWNmZmU2N2Y1IiwiZXhwIjo4ODEwNjUwNjIwMn0.AKlgP70-IOhFwPicUeiIH2jHeAwhvNTMrM2Z4LLuNNw',
                    'ShopID'=>'7QbiBLnzTncsKhJn',
                    'Secret'=>'B0IrZSr0tYON2FoAvxK2NqLHwv1HqxOBtcxe',
                    'price'=>$cookie->booking_price_rub,
                    'currency'=>'RUB',
                ];
            $token=request()->_token;

            return view('booking.pay', compact(['cookie', 'API', 'token']));

        }
        else
            return redirect()->route('main.index');
    }

    public function pay_page_get()
    {
        if(isset($_COOKIE['order']))
        {
            $dataService = new OrderDataService();
            $cookie=$dataService->get_data();
            return view('booking.pay', compact(['cookie']));
        }
        return redirect()->route('main.index');
    }
}
