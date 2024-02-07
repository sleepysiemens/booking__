    <div class="card border-0 shadow mb-3">
        <div class="card-body pb-lg-3 pb-5">
            <div class="row">
                <div class="col-lg">
                    {{--HEADER--}}
                    <div class="d-flex">
                        <div class="rounded-circle overflow-hidden bg-primary w-25px h-25px my-auto">
                            <img class="w-100 h-100" src="{{asset('img/SU.png')}}" alt="avia">
                        </div>
                        <p class="m-auto ms-2">{{$result['airline']}}</p>
                    </div>
                    {{--/HEADER--}}
                    {{--BODY--}}
                    <div style="display: block;">
                        <div class="row row-cols-lg-4 mt-3" >
                            <div class="col">
                                <div class="container">
                                    <p class="text-dark mb-0">{{date("Y.m.d", $result['depart_datetime'])}}</p>
                                    <h2 class="fw-400 my-1 ff-montserrat">{{date("H:i", $result['depart_datetime'])}}</h2>
                                    <p class="text-dark fw-300 mt-0">{{$result['origin']}}, {{$request['origin']}}</p>
                                </div>
                            </div>
                            <div class="col d-flex opacity-25">
                                <div class="bg-black w-100 my-auto position-relative" style="height: 2px">
                                    {{--<div class="position-absolute bg-white m-auto rounded-circle border-2 border-black border" style="width: 10px; height: 10px; left: 0; right: 0; top: 0; bottom: 0"></div>--}}
                                </div>
                                <i class="fas fa-caret-right my-auto"></i>
                            </div>
                            <div class="col">
                                <div class="container">
                                    <p class="text-dark mb-0">{{date("Y.m.d", $result['arrival_datetime'])}}</p>
                                    <h2 class="fw-400 my-1 ff-montserrat">{{date("H:i", $result['arrival_datetime'])}}</h2>
                                    <p class="text-dark fw-300 mt-0">{{$result['destination']}}, {{$request['destination']}}</p>
                                </div>
                            </div>
                            <div class="col d-none d-lg-block">
                                <div class="container">
                                    <p class="fw-500 mb-0">{{$result['duration']}}</p>
                                    <p class="fw-400 fs-12px text-green mb-0">прямой</p>
                                    <p class="fw-400 fs-12px text-black-200">Рейс {{$result['flight_num']}}</p>
                                </div>
                            </div>
                        </div>

                    </div>
                    {{--DETAILS--}}
                    <div style="display: none" id="details-long-">
                        <div class="row row-cols-lg-4 mt-3" >
                            <div class="col">
                                <div class="container">
                                    <p class="text-dark mb-0">21 января, вс</p>
                                    <h2 class="fw-400 my-1 ff-montserrat">18:25</h2>
                                    <p class="text-dark fw-300 mt-0">Россия, Новосибирск (OVB)</p>
                                </div>
                            </div>
                            <div class="col d-flex opacity-25">
                                <div class="bg-black w-100 my-auto position-relative" style="height: 2px">
                                </div>
                                <i class="fas fa-caret-right my-auto"></i>
                            </div>
                            <div class="col">
                                <div class="container">
                                    <p class="text-dark mb-0">21 января, вс</p>
                                    <h2 class="fw-400 my-1 ff-montserrat">06:55</h2>
                                    <p class="text-dark fw-300 mt-0">Россия, Москва (MOW)</p>
                                </div>
                            </div>
                            <div class="col d-none d-lg-block">
                                <div class="container">
                                    <p class="fw-500 mb-0">4 ч 30 мин</p>
                                    <p class="fw-400 fs-12px text-green mb-0">прямой</p>
                                    <p class="fw-400 fs-12px text-black-200">Рейс SU-1461</p>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="card bg-light border-light">
                                <div class="card-body row text-black-200 py-2">
                                    <div class="col d-flex">
                                        <i class="far fa-clock my-auto"></i>
                                        <p class="m-0 my-auto ms-2">Пересадка</p>
                                    </div>
                                    <div class="col d-flex justify-content-end">
                                        <p class="m-0 my-auto">3 ч 20 мин</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-cols-lg-4 mt-3">
                            <div class="col">
                                <div class="container">
                                    <p class="text-dark mb-0">21 января, вс</p>
                                    <h2 class="fw-400 my-1 ff-montserrat">18:25</h2>
                                    <p class="text-dark fw-300 mt-0">Россия, Новосибирск (OVB)</p>
                                </div>
                            </div>
                            <div class="col d-flex opacity-25">
                                <div class="bg-black w-100 my-auto position-relative" style="height: 2px">
                                </div>
                                <i class="fas fa-caret-right my-auto"></i>
                            </div>
                            <div class="col">
                                <div class="container">
                                    <p class="text-dark mb-0">21 января, вс</p>
                                    <h2 class="fw-400 my-1 ff-montserrat">06:55</h2>
                                    <p class="text-dark fw-300 mt-0">Россия, Москва (MOW)</p>
                                </div>
                            </div>
                            <div class="col d-none d-lg-block">
                                <div class="container">
                                    <p class="fw-500 mb-0">4 ч 30 мин</p>
                                    <p class="fw-400 fs-12px text-green mb-0">прямой</p>
                                    <p class="fw-400 fs-12px text-black-200">Рейс SU-1461</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{--/BODY--}}
                </div>
                <div class="col-1 p-0 bg-black opacity-20 d-none d-lg-block" style="width: 1px;"></div>
                <div class="bg-black opacity-20 d-block d-lg-none w-100 mb-3" style="height: 1px;"></div>
                {{--PRICE--}}
                <div class="col-lg-3">
                    <div class="container h-100">
                        <div class="h-100 d-flex d-lg-block justify-content-between">
                            <div class="d-lg-none">
                                <p class="fw-500 mb-0">4 ч 30 мин</p>
                                <p class="fw-400 fs-12px text-green mb-0">прямой</p>
                                <p class="fw-400 fs-12px text-black-200">Рейс {{9}}</p>
                            </div>
                            <div class="row my-auto">
                                <h2 class="fw-500 my-lg-1 fs-22px ff-montserrat text-lg-center text-end mt-lg-3">{{$result['price']}} ₽</h2>
                            </div>
                            <form class="row mt-lg-5 d-flex position-relative" method="post" action="{{route('booking.index')}}">
                                @csrf
                                <input type="hidden" name="origin_" value="{{$result['origin']}}">
                                <input type="hidden" name="origin" value="{{$request['origin']}}">
                                <input type="hidden" name="destination_" value="{{$result['destination']}}">
                                <input type="hidden" name="destination" value="{{$request['destination']}}">
                                <input type="hidden" name="depart_datetime" value="{{$result['depart_datetime']}}">
                                <input type="hidden" name="arrival_datetime" value="{{$result['arrival_datetime']}}">
                                <input type="hidden" name="duration" value="{{$result['duration']}}">
                                <input type="hidden" name="airline" value="{{$result['airline']}}">
                                {{--<input type="hidden" name="airline_logo" value="{{$result['airline_logo']}}">--}}

                                <input type="hidden" name="adults_amount" value="{{$request['passengers']['adults']}}">
                                <input type="hidden" name="children_amount" value="{{$request['passengers']['children']}}">
                                <input type="hidden" name="infants_amount" value="{{$request['passengers']['infants']}}">

                                <input type="hidden" name="passengers_amount" value="{{$request['passengers_amount']}}">

                                <button class="btn-primary btn fs-12px h-55px m-auto">Забронировать</button>
                                <div class="d-flex mt-lg-3 justify-content-center details mt-2">
                                    {{--<a class="text-primary cursor-pointer w-100" onclick="details({{$cnt}})"><i class="fas fa-chevron-down filter-btn" id="details-btn-marker-{{$cnt}}"></i> Детали перелета</a>--}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{--/PRICE--}}
            </div>
        </div>
    </div>
