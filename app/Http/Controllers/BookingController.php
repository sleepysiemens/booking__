<?php

namespace App\Http\Controllers;

use App\Mail\PasswordMail;
use App\Models\User;
use App\Services\AirportService;
use App\Services\OrderDataService;
use App\Services\UserDataService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;


class BookingController extends Controller
{
    public function index(): RedirectResponse
    {
        $request_all = request()->all();
        $request = json_decode($request_all['request']);
        $result = json_decode($request_all['result']);

        $airportService = new AirportService();
        $dataService = new OrderDataService();
        $passengersService = new UserDataService();

        $airports = $airportService->getAllAirports();
        $airports = collect($airports);


        $cookie = $dataService->set_data($request, $result);

        if ($cookie !== null) {
            setcookie('order',$cookie);
            $cookie = json_decode($cookie);

            $adults = $passengersService->define_passengers_array($cookie->passengers->adults, 'взрослый');
            $children = $passengersService->define_passengers_array($cookie->passengers->children, 'ребенок');
            $infants = $passengersService->define_passengers_array($cookie->passengers->infants, 'младенец');

            return redirect()->route('booking.get');
        }

        return redirect()->route('main.index');
    }

    public function get()
    {
        if (isset($_COOKIE['order'])) {
            $dataService = new OrderDataService();
            $airportService = new AirportService();
            $passengersService = new UserDataService();

            $cookie = $dataService->get_data();
            $adults = $passengersService->define_passengers_array($cookie->passengers->adults, 'взрослый');
            $children = $passengersService->define_passengers_array($cookie->passengers->children, 'ребенок');
            $infants = $passengersService->define_passengers_array($cookie->passengers->infants, 'младенец');

            $airports = $airportService->getAllAirports();
            $airports = collect($airports);

            return view('booking.index', compact(['cookie', 'airports', 'adults', 'children', 'infants']));
        }

        return redirect()->route('main.index');
    }

    public function pay_page_post(): RedirectResponse|View
    {
        $dataService = new OrderDataService();

        if ($_COOKIE['order'] !== null) {
            if (auth()->user() == null) {
                $is_registered = User::query()->where('email','=', request()->email)->exists();

                if ($is_registered) {
                    return redirect()->back()->with('error','true');
                } else {
                    $password = Str::random(8);

                    if (Session::get('ref_id') === null) {
                        $user = User::query()->create([
                            'name'       => request()->user[1]['name'],
                            'email'      => request()->email,
                            'password'   => Hash::make($password),
                            'is_partner' => false,
                        ]);
                    } else {
                        $user = User::query()->create([
                            'name'       => request()->user[1]['name'],
                            'email'      => request()->email,
                            'password'   => Hash::make($password),
                            'ref_id'     => Session::get('ref_id'),
                            'is_partner' => false,
                        ]);
                    }

                    if ($user->email !== null) {
                        Mail::to(request()->email)->send(new PasswordMail($password));
                    }

                    auth()->login($user);
                }
            }

            $cookie = $dataService->update_data(request()->all());
                setcookie('order', json_encode($cookie));

            $API = [
                'API_Key'  => env('API_KEY'),
                'ShopID'   => env('SHOP_ID'),
                'Secret'   => env('API_SECRET'),
                'price'    => $cookie->booking_price_rub,
                'currency' => 'RUB',
                ];
            $token = request()->_token;

            return view('booking.pay', compact(['cookie', 'API', 'token']));

        }

        return redirect()->route('main.index');
    }

    public function pay_page_get(): RedirectResponse|View
    {
        if (isset($_COOKIE['order'])) {
            $dataService = new OrderDataService();
            $cookie = $dataService->get_data();
            $token = (hash('md5',date('Y-m-d h:i:s') . $cookie->user_data->email));
            $API= [
                'API_Key'  => env('API_KEY'),
                'ShopID'   => env('SHOP_ID'),
                'Secret'   => env('API_SECRET'),
                'price'    => $cookie->booking_price_rub,
                'currency' => 'RUB',
            ];

            return view('booking.pay', compact(['cookie', 'API', 'token']));
        }

        return redirect()->route('main.index');
    }
}
