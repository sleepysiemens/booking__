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
                    <p style="font-size: 10px; margin-bottom: 0">01.01.2024</p>
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
                    <p style="font-size: 10px; margin-bottom: 0">ABC123</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p style="font-size: 10px; margin-bottom: 0">Status / Статус:  </p>
                </td>
                <td>
                    <p style="font-size: 10px; margin-bottom: 0">Confirmed / Подтверждено</p>
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

                <tr>
                    <td colspan="3">
                        <p style="font-size: 10px; margin-bottom: 0; padding-left: 10px">1 passenger - adult / 1 пассажир - взрослый</p>
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
                        <p style="font-size: 10px; margin-bottom: 10px; padding-left: 10px">IVANOV IVAN</p>
                    </td>
                    <td>
                        <p style="font-size: 10px; margin-bottom: 10px; padding-left: 10px">01.01.1998</p>
                    </td>
                    <td>
                        <p style="font-size: 10px; margin-bottom: 10px; padding-left: 10px">12345678</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="border-bottom: 1px solid rgba(0,0,0,.15);">
                    </td>
                </tr>
        </table>
    </div>

    {{-- ================================================== FLIGHT INFO ================================================== --}}

    <div style="margin-top: 20px">
        <table style="width: 100%; border-radius: 10px; border: 1px solid rgba(0,0,0,.25); border-spacing: 0; overflow: hidden">
            <tr style="background-color: rgba(0,0,0,.1)">
                <td colspan="3" style="border-bottom: 1px solid rgba(0,0,0,.15); padding: 5px 10px">
                    <div style="display: flex; font-size: 10px">
                        <i class="fas fa-male my-auto"></i>
                        <p style="margin: auto 0; margin-right: 10px">Moscow (MOW) / Novosibirsk (OVB)</p>
                    </div>
                </td>
            </tr>
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
                        <p style="font-size: 10px; margin-bottom: 0px; padding-left: 10px">Airline</p>
                        <p style="font-size: 10px; margin-bottom: 10px; padding-left: 10px; margin-top: 0">Economy / Эконом</p>
                    </td>
                    <td>
                        <p style="font-size: 10px; margin-bottom: 0px; padding-left: 10px">00:00</p>
                        <p style="font-size: 10px; margin-bottom: 10px; padding-left: 10px; margin-top: 0">Moscow, MOW / Москва, MOW</p>
                    </td>
                    <td>
                        <p style="font-size: 10px; margin-bottom: 0px; padding-left: 10px">01.01.2024, 00:00</p>
                        <p style="font-size: 10px; margin-bottom: 10px; padding-left: 10px; margin-top: 0">Novosibirsk, OVB / Новосибирск, OVB</p>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <p style="font-size: 10px; margin-bottom: 10px; padding-left: 10px; margin-top: 0">Flight time / Время в пути: 6 h 30 m / 6 ч 30 м</p>
                    </td>
                    <td></td>
                </tr>
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
                    <p style="font-size: 10px; margin-bottom: 10px; padding-left: 10px; margin-top: 0">10.000 ₽</p>
                </td>
                <td>
                    <p style="font-size: 10px; margin-bottom: 10px; padding-left: 10px; margin-top: 0">699 ₽</p>
                </td>
                <td>
                    <p style="font-size: 10px; margin-bottom: 10px; padding-left: 10px; margin-top: 0">10.699 ₽</p>
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
