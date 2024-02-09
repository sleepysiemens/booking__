@extends('Layouts.ticket')

@section('content')
    <div class="section bg-light min-vh-100">
        <div class="container">
            <div class="card shadow">
                <div class="card-body p-4">

                    <div class="row">
                        <div class="d-flex">
                            <div class="rounded-circle overflow-hidden bg-primary w-25px h-25px my-auto">
                                <img class="w-100 h-100" src="http://127.0.0.1:8000/img/SU.png" alt="avia">
                            </div>
                            <p class="m-auto ms-2">{{$result->airline}}</p>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col">
                            <h2 class="fw-400 text-center">Itinerary receipt / Маршрутная квитанция</h2>
                        </div>
                    </div>

                    <div class="row mt-4 mb-2 justify-content-center">
                        <div class="col-lg-5 col-6">
                            <p class="fw-500 mb-2">Reservation date / Дата бронирования: </p>
                            <p class="fw-500 mb-2">Reservation code / Код бронирования: </p>
                            <p class="fw-500">Status / Статус: </p>
                        </div>
                        <div class="col-lg-5 col-6">
                            <p class="fw-400 mb-2">{{$order->created_at}}</p>
                            <p class="fw-400 mb-2">WBBYWD</p>
                            <p class="fw-400">Confirmed / Подтверждено </p>
                        </div>
                    </div>

                    <div class="row px-20px">
                        <div class="col-12 p-0 bg-black m-auto opacity-10" style="height: 2px"></div>
                    </div>

                    {{-- ================================================== PASSENGER INFO ================================================== --}}
                    <div class="row mt-3">
                        <div class="col p-0 p-lg-2">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col d-flex">
                                            <i class="fas fa-male my-auto"></i>
                                            <p class="fw-500 my-auto ms-3">Passengers information / Информация о пассажирах</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-4">
                                            <p class="fw-500 mb-2">Passenger / Пассажир</p>
                                            <p class="fw-400 mb-0">{{$user_info->surname}} {{$user_info->name}}</p>
                                        </div>
                                        <div class="col-4">
                                            <p class="fw-500 mb-2">Birthday / Дата рождения</p>
                                            <p class="fw-400 mb-0">{{$user_info->date}}</p>
                                        </div>
                                        <div class="col-4">
                                            <p class="fw-500 mb-2">Document / Документ</p>
                                            <p class="fw-400 mb-0">{{$user_info->number}} {{$user_info->serial}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- ================================================== FLIGHT INFO ================================================== --}}
                    <div class="row mt-3">
                        <div class="col p-0 p-lg-2">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col d-flex">
                                            <i class="fas fa-plane my-auto"></i>
                                            <p class="fw-500 my-auto ms-3">{{$request->origin}} ({{$result->origin}}) / {{$request->destination}} ({{$result->destination}})</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    @if($result->transfers_amount==0)
                                        <div class="row mb-3">
                                            <div class="col-3">
                                                <p class="fw-500 mb-2">Flight / Рейс</p>
                                                <p class="fw-400 mb-0">{{$result->flight_num}}</p>
                                                <p class="fw-400 mb-0">{{$result->airline}}</p>
                                                {{--<p class="fw-400 mb-0">Boeing 787-9</p>--}}
                                                <p class="fw-400 mb-0">Economy / Эконом</p>
                                            </div>
                                            <div class="col-5">
                                                <p class="fw-500 mb-2">Departing / Отправление</p>
                                                <div class="d-lg-flex d-block">
                                                    <p class="fw-500 mb-0">{{date('Y.m.d', $result->depart_datetime)}}</p>
                                                    <p class="fw-400 mb-0 ms-2">{{$request->origin}},  {{$result->origin}}</p>
                                                </div>
                                                <div class="d-lg-flex d-block mt-2 mt-lg-0">
                                                    <p class="fw-500 mb-0">{{date('H:i', $result->depart_datetime)}}</p>
                                                    <p class="fw-400 mb-0 ms-2">{{$request->origin}},  {{$result->origin}}</p>
                                                </div>
                                                <br>
                                                <div class="d-lg-flex d-none mt-2 mt-lg-0">
                                                    <p class="fw-500 mb-0">Flight time / Время в пути: </p>
                                                    <p class="fw-400 mb-0 ms-lg-2">{{$result->duration}}</p>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <p class="fw-500 mb-2">Arriving / Прибытие</p>
                                                <div class="d-lg-flex d-block mt-2 mt-lg-0">
                                                    <p class="fw-500 mb-0">{{date('Y.m.d', $result->arrival_datetime)}}</p>
                                                    <p class="fw-400 mb-0 ms-2">{{$request->destination}},  {{$result->destination}}</p>
                                                </div>
                                                <div class="d-lg-flex d-block mt-2 mt-lg-0">
                                                    <p class="fw-500 mb-0">{{date('H:i', $result->depart_datetime)}}</p>
                                                    <p class="fw-400 mb-0 ms-2">{{$request->destination}},  {{$result->destination}}</p>
                                                </div>
                                            </div>

                                        </div>
                                    @else
                                        @foreach($result->transfers as $transfer)
                                            @if(isset($last_arrival))
                                                <div class="row mt-3">
                                                    <div class="col-12 p-0 bg-black m-auto opacity-10" style="height: 2px"></div>
                                                </div>

                                                <div class="row my-4">
                                                    <div class="d-flex">
                                                        <p class="fw-500 mb-0">Transfer / Пересадка:</p>
                                                        @php
                                                            $date1 = Carbon\Carbon::parse(date("Y-m-d H:i:s",$transfer->depart_datetime));
                                                            $date2 = Carbon\Carbon::parse(date("Y-m-d H:i:s",$last_arrival));
                                                            $diff = $date1->diff($date2);
                                                        @endphp
                                                        <p class="fw-400 mb-0 ms-2">{{$diff->h}} h {{$diff->i}} min / {{$diff->h}} ч {{$diff->i}} мин</p>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-12 p-0 bg-black m-auto opacity-10" style="height: 2px"></div>
                                                </div>
                                            @endif

                                            <div class="row mt-3">
                                                <div class="col-3">
                                                    <p class="fw-400 mb-2">{{$transfer->flight_num}}</p>
                                                    <p class="fw-400 mb-0">{{$transfer->airline}}</p>
                                                    {{--<p class="fw-400 mb-0">Airbus A330-200</p>--}}
                                                    <p class="fw-400 mb-0">Economy / Эконом</p>
                                                </div>
                                                <div class="col-5">
                                                    <div class="d-lg-flex d-block mt-2 mt-lg-0">
                                                        <p class="fw-500 mb-0">{{ date("d.m.Y", $transfer->depart_datetime) }}</p>
                                                        @php $origin__=$airports->where('airport_code', '=', $transfer->origin)->first(); @endphp
                                                        <p class="fw-400 mb-0 ms-2">{{$transfer->origin}}, {{$origin__->city_name}}</p>
                                                    </div>
                                                    <div class="d-lg-flex d-block mt-2 mt-lg-0">
                                                        <p class="fw-500 mb-0">{{ date("H:i", $transfer->depart_datetime) }}</p>
                                                        <p class="fw-400 mb-0 ms-2">{{$transfer->origin}}, {{$origin__->city_name}}</p>
                                                    </div>
                                                    <br>
                                                    <div class="d-lg-flex d-none mt-2 mt-lg-0">
                                                        <p class="fw-500 mb-0">Flight time / Время в пути:</p>
                                                        <p class="fw-400 mb-0 ms-lg-2">{{$result->duration}}</p>
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="d-lg-flex d-block mt-2 mt-lg-0">
                                                        <p class="fw-500 mb-0">{{ date("d.m.Y", $transfer->arrival_datetime) }}</p>
                                                        @php $destination__=$airports->where('airport_code', '=', $transfer->destination)->first(); @endphp
                                                        <p class="fw-400 mb-0 ms-2">{{$transfer->destination}}, {{$destination__->city_name}}</p>
                                                    </div>
                                                    <div class="d-lg-flex d-block mt-2 mt-lg-0">
                                                        <p class="fw-500 mb-0">{{ date("H:i", $transfer->arrival_datetime) }}</p>
                                                        <p class="fw-400 mb-0 ms-2">{{$transfer->destination}}, {{$destination__->city_name}}</p>
                                                    </div>
                                                </div>
                                                <div class="col-12 d-lg-none d-flex mt-2">
                                                    <p class="fw-500 mb-0">Flight time / Время в пути:</p>
                                                    <p class="fw-400 mb-0 ms-2">{{$result->duration}}</p>
                                                </div>
                                            </div>
                                            @php $last_arrival=$transfer->arrival_datetime @endphp
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- ================================================== PAYMENT INFO ================================================== --}}
                    <div class="row mt-3">
                        <div class="col p-0 p-lg-2">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col d-flex">
                                            <i class="fas fa-receipt my-auto"></i>
                                            <p class="fw-500 my-auto ms-3">Payment information / Сведения об оплате</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-4">
                                            <p class="fw-500 mb-2">Fare / Тариф</p>
                                            <p class="fw-400 mb-0">{{$result->price}} ₽</p>
                                        </div>
                                        <div class="col-4">
                                            <p class="fw-500 mb-2">Service fee / Сервисный сбор</p>
                                            <p class="fw-400 mb-0">{{$order->price}} ₽</p>
                                        </div>
                                        <div class="col-4">
                                            <p class="fw-500 mb-2">Total cost / Общая стоимость</p>
                                            <p class="fw-400 mb-0">{{$result->price + $order->price}} ₽</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container mt-4">
                        <div class="row">
                            <div class="col-12 bg-warning-200 rounded">
                                <div class="row py-2">
                                    <div class="col-1">
                                        <i class="fas fa-exclamation-triangle text-warning fs-20px"></i>
                                    </div>
                                    <div class="col-11">
                                        <h5 class="text-center m-0">Warning!</h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-12 fs-16px">
                                <ul>
                                    <li>
                                        <p class="mb-1">Departures and Arrivals are in local time for each airport.</p>
                                    </li>
                                    <li>
                                        <p class="mb-1">The airline may change the flights timetable. Please be sure to check your flight departure time 24 hours before the flight.</p>
                                    </li>
                                    <li>
                                        <p class="mb-1">The quantity of baggage items is the quantity of bags that you can check in as baggage. You can check the exact weight or dimensions of the baggage allowed on the airline’s website.</p>
                                    </li>
                                    <li>
                                        <p class="mb-1">Check-in is complete 60 min. before to departure unless the carrier announces otherwise.</p>
                                    </li>
                                    <li>
                                        <p class="mb-1">The ticket is only valid when presented with a valid form of ID issued in the name of the person holding the ticket: national document or travel passport.</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
