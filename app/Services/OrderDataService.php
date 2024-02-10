<?php
// app/Services/SetOrderDataService.php
namespace App\Services;

use Illuminate\Support\Facades\Http;

class OrderDataService
{
    public function set_data($request, $result)
    {
        unset($request->_token);
        $request->total_rub=($request->passengers->children+$request->passengers->adults+$request->passengers->infants)*699;
        $request->total_eur=($request->passengers->children+$request->passengers->adults+$request->passengers->infants)*14;
        //
        $cookie=
            [
                'origin'=>$result->origin,
                'origin_city'=>$request->origin,
                'destination'=>$result->destination,
                'destination_city'=>$request->destination,
                'depart_datetime'=>$result->depart_datetime,
                'arrival_datetime'=>$result->arrival_datetime,
                'airline'=>$result->airline,
                'flight_num'=>$result->flight_num,
                'duration'=>$result->duration,
                'ticket_price'=>$result->price,
                'transfer'=>$result->transfer,
                'transfers_amount'=>$result->transfers_amount,
                'booking_price_rub'=>$request->total_rub,
                'booking_price_eur'=>$request->total_eur,
                'passengers'=>$request->passengers,
                'passengers_amount'=>$request->passengers_amount,

            ];

        if(isset($result->transfers))
        {
            $cookie['transfers']=$result->transfers;
        }

        $cookie=json_encode($cookie);

        return $cookie;
    }

    public function update_data($data)
    {
        //dd($_COOKIE['order']);
        if(isset($_COOKIE['order']))
        {
            unset($data['_token']);
            $data=json_encode($data);
            $data=json_decode($data);
            $order=json_decode($_COOKIE['order']);
            $order->user_data=$data;
            return $order;
        }
        else
            return null;
    }

    public function get_data()
    {
        $cookie=json_decode($_COOKIE['order']);
        //dd($cookie);
        return $cookie;
    }

}

?>
