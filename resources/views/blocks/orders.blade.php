<div class="col-lg-9 col-12">
    <h4 class="fw-500 mb-3">{{__('Заказы')}}</h4>
    @if(isset($orders))
        @foreach($orders as $order)
            @php
                $json=$order->data;
                $cookie=json_decode($json);
            @endphp
            <div class="card border-0 shadow mb-4">
                <span class="card-header bg-white mx-3">
                    <div class="row py-2">
                        <div class="col d-flex">
                            <h5 class="text-primary my-auto">{{__('Заказ №')}} {{$order->number}}</h5>
                            @if($order->is_confirmed)
                                <p class="my-auto ms-2 text-green">{{__('Подтвержден')}}</p>
                            @else
                                <p class="my-auto ms-2 text-warning">{{__('Ожидает подтверждения')}}</p>
                            @endif
                        </div>
                    </div>
                </span>
                <div class="card-body">
                    <div class="row mt-3">
                        <div class="col-10">

                            <div class="row">
                                <div class="col-4">
                                    <p class="fs-12px m-0 opacity-50">{{__('Дата создания:')}}</p>
                                    <p class=" my-2">{{$order->created_at}}</p>
                                </div>
                                <div class="col-4">
                                    <p class="fs-12px m-0 opacity-50">{{__('Откуда:')}}</p>
                                    <p class=" my-2">{{$cookie->origin_city}} ({{$cookie->origin}})</p>
                                </div>
                                <div class="col-4">
                                    <p class="fs-12px m-0 opacity-50">{{__('Куда:')}}</p>
                                    <p class=" my-2">{{$cookie->destination_city}} ({{$cookie->destination}})</p>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-4">
                                    <p class="fs-12px m-0 opacity-50">{{__('Авиакомпания:')}}</p>
                                    <p class=" my-2">{{$cookie->airline}}</p>
                                </div>
                                <div class="col-4">
                                    <p class="fs-12px m-0 opacity-50">{{__('Рейс:')}}</p>
                                    <p class=" my-2">{{$cookie->flight_num}}</p>
                                </div>
                                <div class="col-4">
                                    <p class="fs-12px m-0 opacity-50">{{__('Кол-во пассажиров:')}}</p>
                                    <p class=" my-2">
                                        {{$cookie->passengers_amount}}
                                        @if(gettype($cookie->passengers_amount)!='string')
                                            @if($cookie->passengers_amount==1)
                                                {{__('пассажир')}}
                                            @elseif($cookie->passengers_amount>1 and $cookie->passengers_amount<5 )
                                                {{__('пассажира')}}
                                            @else
                                                {{__('пассажиров')}}
                                            @endif
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-2" style="border-left: 1px solid rgba(0,0,0,.2)">
                            <p class="fs-12px m-0 opacity-50 text-center">{{__('Стоимость:')}}</p>
                            <h3 class="text-center mt-3">{{$order->price}} ₽</h3>
                            @if($order->created_at->addDays(7)->isFuture())
                            <p class="text-center mt-4"><a href="{{route('order.index', $order->number)}}">{{__('Посмотреть')}}</a></p>
                            @else
                                <p class="text-center mt-4 text-warning">Срок действия истек</p>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        @endforeach
    @else
        <div class="section h-100">
            <div class="row">
                <div class="col">
                    <h2 class="text-center">{{__('Заказов пока нет')}}</h2>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p class="text-center">{{__('У вас нет купленных бронирований, перейдите на главную для поиска билета')}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <a class="btn btn-primary d-flex w-200px h-50px m-auto" href="{{asset(route('main.index'))}}">
                        <p class="m-auto fw-500">{{__('На главную')}}</p>
                    </a>
                </div>
            </div>
        </div>
    @endif
</div>
