    <div class="card border-0 shadow mb-3">
        <div class="card-body pb-lg-3 pb-5">
            <div class="row">
                <div class="col-lg">
                    {{--HEADER--}}
                    <div class="d-flex">
                        <img class="h-25px m-0" src="https://pics.avs.io/200/50/{{$result['airline_short']}}.png" alt="avia">
                    </div>
                    {{--/HEADER--}}
                    {{--BODY--}}
                    <div style="display: block;" id="ticket-body-{{$result['id']}}">
                        <div class="row row-cols-lg-4 mt-3" >
                            <div class="col">
                                <div class="container">
                                    <p class="text-dark mb-0">{{date("Y.m.d", $result['depart_datetime'])}}</p>
                                    <h2 class="fw-400 my-1 ff-montserrat">{{date("H:i", $result['depart_datetime'])}}</h2>
                                    @php $origin__=$airports_->where('airport_code', '=', $result['origin'])->first(); @endphp
                                    <p class="text-dark fw-300 mt-0">{{$origin__->city_name}}, {{$origin__->name}}, {{$result['origin']}}</p>
                                </div>
                            </div>
                            <div class="col d-flex opacity-25">
                                <div class="bg-black w-100 my-auto position-relative" style="height: 2px">
                                    @if($result['transfers_amount']!=0)
                                    <div class="position-absolute bg-white m-auto rounded-circle border-2 border-black border" style="width: 10px; height: 10px; left: 0; right: 0; top: 0; bottom: 0"></div>
                                    @endif
                                </div>
                                <i class="fas fa-caret-right my-auto"></i>
                            </div>
                            <div class="col">
                                <div class="container">
                                    <p class="text-dark mb-0">{{date("Y.m.d", $result['arrival_datetime'])}}</p>
                                    <h2 class="fw-400 my-1 ff-montserrat">{{date("H:i", $result['arrival_datetime'])}}</h2>
                                    @php $destination__=$airports_->where('airport_code', '=', $result['destination'])->first(); @endphp
                                    <p class="text-dark fw-300 mt-0">{{$destination__->city_name}}, {{$destination__->name}}, {{$result['destination']}}</p>
                                </div>
                            </div>
                            <div class="col d-none d-lg-block">
                                <div class="container">
                                    <p class="fw-500 mb-0">{{$result['duration']}}</p>
                                    <p class="fw-400 fs-12px @if($result['transfers_amount']==0) text-green @else text-warning @endif mb-0">{{$result['transfer']}}</p>
                                    @if($result['transfers_amount']==0)
                                        <p class="fw-400 fs-12px text-black-200">{{__('Рейс')}} {{$result['flight_num']}}</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                    {{--DETAILS--}}
                    @if($result['transfers_amount']>0)
                        <div style="display:none;" id="details-div-{{$result['id']}}">
                            @foreach($result['transfers'] as $transfer)

                                @if($transfer['transfer']!='start' and isset($last_arrival))
                                    <div class="container">
                                        <div class="card bg-light border-light">
                                            <div class="card-body row text-black-200 py-2">
                                                <div class="col d-flex">
                                                    <i class="far fa-clock my-auto"></i>
                                                    <p class="m-0 my-auto ms-2">{{__('Пересадка')}}</p>
                                                </div>
                                                <div class="col d-flex justify-content-end">
                                                    @php
                                                        $date1 = Carbon\Carbon::parse(date("Y-m-d H:i:s",$transfer['depart_datetime']));
                                                        $date2 = Carbon\Carbon::parse(date("Y-m-d H:i:s",$last_arrival));
                                                        $diff = $date1->diff($date2);
                                                    @endphp
                                                    <p class="m-0 my-auto">{{$diff->h}} {{__('ч')}} {{$diff->i}} {{__('мин')}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <div class="row row-cols-lg-4 mt-3" >
                                    <div class="col">
                                        <div class="container">
                                            <p class="text-dark mb-0">{{date("Y.m.d", $transfer['depart_datetime'])}}</p>
                                            <h2 class="fw-400 my-1 ff-montserrat">{{date("H:i", $transfer['depart_datetime'])}}</h2>
                                            @php $origin__=$airports_->where('airport_code', '=', $transfer['origin'])->first(); @endphp
                                            <p class="text-dark fw-300 mt-0">{{$origin__->city_name}}, {{$origin__->name}}, {{$transfer['origin']}}</p>
                                        </div>
                                    </div>
                                    <div class="col d-flex opacity-25">
                                        <div class="bg-black w-100 my-auto position-relative" style="height: 2px">
                                        </div>
                                        <i class="fas fa-caret-right my-auto"></i>
                                    </div>
                                    <div class="col">
                                        <div class="container">
                                            <p class="text-dark mb-0">{{date("Y.m.d", $transfer['arrival_datetime'])}}</p>
                                            <h2 class="fw-400 my-1 ff-montserrat">{{date("H:i", $transfer['arrival_datetime'])}}</h2>
                                            @php $destination__=$airports_->where('airport_code', '=', $transfer['destination'])->first(); @endphp

                                            <p class="text-dark fw-300 mt-0">{{$destination__->city_name}}, {{$destination__->name}}, {{$transfer['destination']}}</p>
                                        </div>
                                    </div>
                                        <div class="col d-none d-lg-block">
                                            <div class="container">
                                                <p class="fw-500 mb-0">{{$transfer['duration']}}</p>
                                                <p class="fw-400 fs-12px text-green mb-0">{{__('прямой')}}</p>
                                                <p class="fw-400 fs-12px text-black-200">{{__('Рейс')}} {{$transfer['flight_num']}}</p>
                                            </div>
                                        </div>
                                </div>
                                @php $last_arrival=$transfer['arrival_datetime'] @endphp
                            @endforeach
                        </div>
                    @endif

                    {{--/BODY--}}
                </div>
                <div class="col-1 p-0 bg-black opacity-20 d-none d-lg-block" style="width: 1px;"></div>
                <div class="bg-black opacity-20 d-block d-lg-none w-100 mb-3" style="height: 1px;"></div>
                {{--PRICE--}}
                <div class="col-lg-3">
                    <div class="container h-100">
                        <div class="h-100 d-flex d-lg-block justify-content-between">
                            <div class="d-lg-none">
                                <p class="fw-500 mb-0">{{$result['duration']}}</p>
                                <p class="fw-400 fs-12px @if($result['transfers_amount']==0) text-green @else text-warning @endif mb-0">{{$result['transfer']}}</p>
                                @if($result['transfers_amount']==0)
                                    <p class="fw-400 fs-12px text-black-200">{{__('Рейс')}} {{$result['flight_num']}}</p>
                                @endif
                            </div>
                            <div class="row my-auto">
                                <h2 class="fw-500 my-lg-1 fs-22px ff-montserrat text-lg-center text-end mt-lg-3">@if( gettype($result['price'])!='string') {{ number_format( $result['price'] , 0 , " "  , " " )}} @endif ₽</h2>
                            </div>
                            <form class="row mt-lg-5 d-flex position-relative" method="post" action="{{route('booking.index')}}" {{--target="_blank"--}}>
                                @csrf
                                <input type="hidden" name="request" value="{{json_encode($request)}}">
                                <input type="hidden" name="result" value="{{json_encode($result)}}">

                                <button class="btn-primary btn fs-12px h-55px m-auto">{{__('Забронировать')}}</button>
                                <div class="d-flex mt-lg-3 justify-content-center details mt-2">
                                    @if($result['transfers_amount']>0)
                                        <a class="text-primary cursor-pointer w-100" onclick="details({{$result['id']}})"><i class="fas fa-chevron-down filter-btn" id="details-btn-marker-{{$result['id']}}"></i> {{__('Детали перелета')}}</a>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{--/PRICE--}}
            </div>
        </div>
    </div>
