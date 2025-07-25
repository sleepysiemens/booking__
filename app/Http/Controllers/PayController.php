<?php

namespace App\Http\Controllers;

use App\Jobs\UpdateOrderStatus;
use App\Models\PartnershipApplication;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;

class PayController extends Controller
{
    public function index()
    {
        if (isset($_COOKIE['order'])) {
            $request = request()->all();
            $order = json_decode($_COOKIE['order']);
            $API = [
                'API_Key'  => env('API_KEY'),
                'ShopID'   => env('SHOP_ID'),
                'Secret'   => env('API_SECRET'),
                'price'    => $order->booking_price_rub,
                'currency' => 'RUB',
            ];

            return view('pay.index', compact(['API', 'request']));
        }

        return redirect()->route('main.index');
    }

    public function generate_code(): string
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $code = '';
        $length = 6;

        // Генерируем случайный код
        for ($i = 0; $i < $length; $i++) {
            $code .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $code;
    }

    public function generate_number(): string
    {
        $characters = '0123456789';
        $code = '';
        $length = 8;

        // Генерируем случайный код
        for ($i = 0; $i < $length; $i++) {
            $code .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $code;
    }
    public function confirm(): RedirectResponse
    {
        if (isset($_COOKIE['order']) && $_COOKIE['order'] !== null) {
            $order = json_decode($_COOKIE['order']);

            if ($order->user_data === null) {
                return redirect()->route('booking.get');
            }

            $reservation_code = $this->generate_code();
            $number = $this->generate_number();

            while (Order::query()->where('number','=', $number)->exists()) {
                $number = $this->generate_number();
            }

            $data = [
                    'user_id'          => auth()->user()->id,
                    'price'            => $order->booking_price_rub,
                    'origin'           => $order->origin,
                    'destination'      => $order->destination,
                    'depart_date'      => date("Y-m-d",$order->depart_datetime),
                    'arrival_date'     => date("Y-m-d",$order->arrival_datetime),
                    'flight_num'       => $order->flight_num,
                    'data'             => $_COOKIE['order'],
                    'is_payed'         => true,
                    'is_confirmed'     => false,
                    'reservation_code' => $reservation_code,
                    'number'           => $number
            ];

            $order=Order::query()->create($data);

            //partnership
            if (auth()->user()->ref_id !== null) {
                $partner = PartnershipApplication::query()->where('user_id','=',auth()->user()->ref_id)->first();
                $partner->update(['balance'=>$partner['balance'] + 10]);
            }

            UpdateOrderStatus::dispatch($order->id)->delay(now()->addSeconds(90));

            return redirect()->route('wait.index');
        }
        return redirect()->route('main.index');
    }

    public function fail(): RedirectResponse
    {
        return redirect()->route('booking.get');
    }
}
