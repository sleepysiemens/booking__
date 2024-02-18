<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body style="font-family: 'DejaVu Sans', sans-serif !important; ">
<div>
    <div>
        <div>
            <h2 style="font-size: 18px; font-weight: 400; text-align: center">Itinerary receipt / Маршрутная квитанция</h2>
        </div>
    </div>
    <div style="border-bottom: 1px solid rgba(0,0,0,.5); padding-bottom: 10px">
        <table style="width: 100%">
            <tr>
                <td>
                    <p style="font-size: 10px; margin-bottom: 0">Reservation date / Дата бронирования: </p>
                </td>
                <td>
                    <p style="font-size: 10px; margin-bottom: 0">{{$order->created_at}}</p>
                </td>
                <td rowspan="3">
                    <img src="{{$pic}}" alt="qr" width="75px" height="75px">
                </td>
            </tr>
            <tr>
                <td>
                    <p style="font-size: 10px; margin-bottom: 0">Reservation code / Код бронирования: </p>
                </td>
                <td>
                    <p style="font-size: 10px; margin-bottom: 0">{{$order->reservation_code}}</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p style="font-size: 10px; margin-bottom: 0">Status / Статус:  </p>
                </td>
                <td>
                    <p style="font-size: 10px; margin-bottom: 0">@if($order->is_confirmed) Confirmed / Подтверждено @else Not confirmed / Не подтверждено @endif</p>
                </td>
            </tr>
        </table>
    </div>

    {{-- ================================================== PASSENGER INFO ================================================== --}}
    <div style="margin-top: 15px">
        <table style="width: 100%; border-radius: 10px; border: 1px solid rgba(0,0,0,.25); border-spacing: 0; overflow: hidden">
            <tr style="background-color: rgba(0,0,0,.1)">
                <td colspan="3" style="border-bottom: 1px solid rgba(0,0,0,.15); padding: 5px 10px">
                    <div style="display: flex; font-size: 10px">
                        <i class="fas fa-male my-auto"></i>
                        <p style="margin: auto 0; margin-right: 10px">Passengers information / Информация о пассажирах</p>
                    </div>
                </td>
            </tr>
            @php
                $passengers_cnt=0;
                $passengers_max=explode(' ',$cookie->passengers_amount);
            @endphp
            @foreach($cookie->user_data->user as $user)
                @php $passengers_cnt++; @endphp

                <tr>
                    <td colspan="3">
                        <p style="font-size: 10px; margin-bottom: 0; padding-left: 10px">{{$passengers_cnt}} passenger - {{__($user->type.'_')}} / {{$passengers_cnt}} пассажир - {{$user->type}}</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p style="font-size: 10px; margin-bottom: 0; padding-left: 10px">Passenger / Пассажир</p>
                    </td>
                    <td>
                        <p style="font-size: 10px; margin-bottom: 0; padding-left: 10px">Birthday / Дата рождения</p>
                    </td>
                    <td>
                        <p style="font-size: 10px; margin-bottom: 0; padding-left: 10px">Document / Документ</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p style="font-size: 10px; margin-bottom: 10px; padding-left: 10px">{{$user->surname}} {{$user->name}}</p>
                    </td>
                    <td>
                        <p style="font-size: 10px; margin-bottom: 10px; padding-left: 10px">{{$user->date_of_birth}}</p>
                    </td>
                    <td>
                        <p style="font-size: 10px; margin-bottom: 10px; padding-left: 10px">{{$user->serial_number}}</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="border-bottom: 1px solid rgba(0,0,0,.15);">
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

    {{-- ================================================== FLIGHT INFO ================================================== --}}

    <div style="margin-top: 20px">
        <table style="width: 100%; border-radius: 10px; border: 1px solid rgba(0,0,0,.25); border-spacing: 0; overflow: hidden">
            <tr style="background-color: rgba(0,0,0,.1)">
                <td colspan="3" style="border-bottom: 1px solid rgba(0,0,0,.15); padding: 5px 10px">
                    <div style="display: flex; font-size: 10px">
                        <i class="fas fa-male my-auto"></i>
                        <p style="margin: auto 0; margin-right: 10px">{{$cookie->origin_city}} ({{$cookie->origin}}) / {{$cookie->destination_city}} ({{$cookie->destination}})</p>
                    </div>
                </td>
            </tr>
            @foreach($cookie->transfers as $transfer)
                @if(isset($last_arrival))
                    @php
                        $date1 = Carbon\Carbon::parse(date("Y-m-d H:i:s",$transfer->depart_datetime));
                        $date2 = Carbon\Carbon::parse(date("Y-m-d H:i:s",$last_arrival));
                        $diff = $date1->diff($date2);
                    @endphp
                    <tr>
                        <td colspan="3" style="border-bottom: 1px solid rgba(0,0,0,.15); border-top: 1px solid rgba(0,0,0,.15)">
                            <p style="font-size: 10px; margin-bottom: 10px; padding-left: 10px">Transfer / Пересадка: {{$diff->h}} h {{$diff->i}} min / {{$diff->h}} ч {{$diff->i}} мин</p>
                        </td>
                    </tr>
                @endif
                <tr>
                    <td>
                        <p style="font-size: 10px; margin-bottom: 5px; padding-left: 10px">Flight / Рейс</p>
                    </td>
                    <td>
                        <p style="font-size: 10px; margin-bottom: 5px; padding-left: 10px">Departing / Отправление</p>
                    </td>
                    <td>
                        <p style="font-size: 10px; margin-bottom: 5px; padding-left: 10px">Arriving / Прибытие</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p style="font-size: 10px; margin-bottom: 0px; padding-left: 10px">{{$cookie->airline}}</p>
                        <p style="font-size: 10px; margin-bottom: 10px; padding-left: 10px; margin-top: 0">Economy / Эконом</p>
                    </td>
                    @php
                        $origin_city=$airports->where('airport_code', '=', $cookie->origin)->first();
                    @endphp
                    <td>
                        <p style="font-size: 10px; margin-bottom: 0px; padding-left: 10px">{{ date("d.m.Y", $transfer->depart_datetime) }}, {{ date("H:i", $transfer->depart_datetime) }}</p>
                        <p style="font-size: 10px; margin-bottom: 10px; padding-left: 10px; margin-top: 0">{{$origin_city->city_name_en}},  {{$cookie->origin}} / {{$cookie->origin_city}},  {{$cookie->origin}}</p>
                    </td>
                    @php
                        $destination_city=$airports->where('airport_code', '=', $cookie->destination)->first();
                    @endphp
                    <td>
                        <p style="font-size: 10px; margin-bottom: 0px; padding-left: 10px">{{ date("d.m.Y", $transfer->arrival_datetime) }}, {{ date("H:i", $transfer->arrival_datetime) }}</p>
                        <p style="font-size: 10px; margin-bottom: 10px; padding-left: 10px; margin-top: 0">{{$destination_city->city_name_en}}, {{$cookie->destination}} / {{$cookie->destination_city}},  {{$cookie->destination}}</p>
                    </td>
                </tr>
                <tr>
                    @php
                        $duration=explode('ч', $transfer->duration);
                        $hours=$duration[0];
                        $minutes= explode('м',$duration[1]);
                        $minutes=$minutes[0];
                    @endphp
                    <td></td>
                    <td>
                        <p style="font-size: 10px; margin-bottom: 10px; padding-left: 10px; margin-top: 0">Flight time / Время в пути: {{$hours}} h {{$minutes}} m /{{$transfer->duration}}</p>
                    </td>
                    <td></td>
                </tr>
                @php $last_arrival=$transfer->arrival_datetime @endphp
            @endforeach
        </table>
    </div>

    {{-- ================================================== PAYMENT INFO ================================================== --}}
    <div style="margin-top: 20px">
        <table style="width: 100%; border-radius: 10px; border: 1px solid rgba(0,0,0,.25); border-spacing: 0; overflow: hidden">
            <tr style="background-color: rgba(0,0,0,.1)">
                <td colspan="3" style="border-bottom: 1px solid rgba(0,0,0,.15); padding: 5px 10px">
                    <div style="display: flex; font-size: 10px">
                        <i class="fas fa-male my-auto"></i>
                        <p style="margin: auto 0; margin-right: 10px">Payment information / Сведения об оплате</p>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <p style="font-size: 10px; margin-bottom: 5px; padding-left: 10px;">Fare / Тариф</p>
                </td>
                <td>
                    <p style="font-size: 10px; margin-bottom: 5px; padding-left: 10px;">Service fee / Сервисный сбор</p>
                </td>
                <td>
                    <p style="font-size: 10px; margin-bottom: 5px; padding-left: 10px;">Total cost / Общая стоимость</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p style="font-size: 10px; margin-bottom: 10px; padding-left: 10px; margin-top: 0">{{$cookie->ticket_price}} ₽</p>
                </td>
                <td>
                    <p style="font-size: 10px; margin-bottom: 10px; padding-left: 10px; margin-top: 0">{{$cookie->booking_price_rub}} ₽</p>
                </td>
                <td>
                    <p style="font-size: 10px; margin-bottom: 10px; padding-left: 10px; margin-top: 0">{{$cookie->ticket_price + $cookie->booking_price_rub}} ₽</p>
                </td>
            </tr>
        </table>
    </div>

    <div style="margin-top: 20px">
        <table style="width: 100%;">
            <tr>
                <td style="width: 100%; border-radius: 10px; background-color: rgba(251,215,163, .8); border-spacing: 0; overflow: hidden; display: flex">
                    <p style="font-size: 14px; margin: auto; padding: 5px 0; text-align: center">Warning!</p>
                </td>
            </tr>
            <tr>
                <td>
                    <ul>
                        <li>
                            <p style="font-size: 10px; margin-bottom: 0; padding-left: 10px; margin-top: 0">Departures and Arrivals are in local time for each airport.</p>
                        </li>
                        <li>
                            <p style="font-size: 10px; margin-bottom: 0; padding-left: 10px; margin-top: 0">The airline may change the flights timetable. Please be sure to check your flight departure time 24 hours before the flight.</p>
                        </li>
                        <li>
                            <p style="font-size: 10px; margin-bottom: 0; padding-left: 10px; margin-top: 0">The quantity of baggage items is the quantity of bags that you can check in as baggage. You can check the exact weight or dimensions of the baggage allowed on the airline’s website.</p>
                        </li>
                        <li>
                            <p style="font-size: 10px; margin-bottom: 0; padding-left: 10px; margin-top: 0">Check-in is complete 60 min. before to departure unless the carrier announces otherwise.</p>
                        </li>
                        <li>
                            <p style="font-size: 10px; margin-bottom: 0; padding-left: 10px; margin-top: 0">The ticket is only valid when presented with a valid form of ID issued in the name of the person holding the ticket: national document or travel passport.</p>
                        </li>
                    </ul>
                </td>
            </tr>
        </table>
    </div>


</div>
</body>
</html>
