<div class="col-lg-9 col-12 sec" id="orders">
    <h4 class="fw-500 mb-3">Заказы</h4>
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
                            <h5 class="text-primary my-auto">Заказ №{{$order->id}}</h5>
                            @if($order->is_confirmed)
                                <p class="my-auto ms-2 text-green">Подтвержден</p>
                            @else
                                <p class="my-auto ms-2 text-warning">Ожидает подтверждения</p>
                            @endif
                        </div>
                    </div>
                </span>
                <div class="card-body">
                    <div class="row mt-3">
                        <div class="col-10">

                            <div class="row">
                                <div class="col-4">
                                    <p class="fs-12px m-0 opacity-50">Дата создания:</p>
                                    <p class=" my-2">{{$order->created_at}}</p>
                                </div>
                                <div class="col-4">
                                    <p class="fs-12px m-0 opacity-50">Откуда:</p>
                                    <p class=" my-2">{{$cookie->origin_city}} ({{$cookie->origin}})</p>
                                </div>
                                <div class="col-4">
                                    <p class="fs-12px m-0 opacity-50">Куда:</p>
                                    <p class=" my-2">{{$cookie->destination_city}} ({{$cookie->destination}})</p>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-4">
                                    <p class="fs-12px m-0 opacity-50">Авиакомпания:</p>
                                    <p class=" my-2">{{$cookie->airline}}</p>
                                </div>
                                <div class="col-4">
                                    <p class="fs-12px m-0 opacity-50">Рейс:</p>
                                    <p class=" my-2">{{$cookie->flight_num}}</p>
                                </div>
                                <div class="col-4">
                                    <p class="fs-12px m-0 opacity-50">Кол-во пассажиров:</p>
                                    <p class=" my-2">{{$cookie->passengers_amount}}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-2" style="border-left: 1px solid rgba(0,0,0,.2)">
                            <p class="fs-12px m-0 opacity-50 text-center">Стоимость:</p>
                            <h3 class="text-center mt-3">{{$order->price}} ₽</h3>
                            <p class="text-center mt-4"><a href="{{route('order.index', $order->id)}}">Посмотреть</a></p>
                        </div>
                    </div>

                </div>
            </div>
        @endforeach
    @else
        <div class="section h-100">
            <div class="row">
                <div class="col">
                    <h2 class="text-center">Заказов пока нет</h2>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p class="text-center">У вас нет купленных бронирований, перейдите на главную для поиска билета</p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <a class="btn btn-primary d-flex w-200px h-50px m-auto" href="{{asset(route('main.index'))}}">
                        <p class="m-auto fw-500">На главную</p>
                    </a>
                </div>
            </div>
        </div>
    @endif
</div>
