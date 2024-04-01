@extends('Layouts.wrapper')

@section('content')
    <!-- BEGIN section -->
    <div class="section section-hero h-300px">
        <!-- BEGIN section-bg -->
        <div class="section-bg with-cover" style="background-image: url({{asset('img/top-view-tourist-items-with-copy-space.jpg')}});"></div>
        <div class="section-bg bg-gray-800 bg-opacity-50"></div>
        <!-- END section-bg -->

        <!-- BEGIN container -->
        <div class="container position-relative">
            <!-- BEGIN section-hero-content -->
            <div class="section-hero-content">
                <!-- BEGIN row -->
                <div class="row">
                    <!-- BEGIN col-8 -->
                    <div class="col-lg-8 col-12">
                        <!-- BEGIN hero-title-desc -->
                        <h1 class="hero-title mb-3 mt-5 pt-md-5">
                            {{__('Бронирование авиабилетов для визы')}}
                        </h1>
                        <!-- END hero-title-desc -->
                    </div>
                    <!-- END col-8 -->
                </div>
                <!-- END row -->
            </div>
            <!-- END section-hero-content -->
        </div>
        <!-- END container -->
    </div>
    <!-- END section -->

    <div class="section bg-light">
        <div class="container">
            <div class="card border-0 shadow">
                <form method="post" action="{{route('payment.index')}}" class="card-body px-5">
                    @csrf
                    <div class="row mt-3">
                        <h2 class="text-center">{{__('Оплата заказа')}}</h2>
                    </div>
                    <div class="row mt-3 p-3 card">
                        <h4 class="col-12">{{__('О заказе')}}</h4>
                        <div class="col-12">
                            <p class="fw-600"><i class="fas fa-plane me-2"></i>{{__('Информация о перелете:')}}</p>
                        </div>

                        <div class="d-flex col-12">
                            <p class="m-0 mt-1 fw-500">{{__('Авиакомпания:')}}</p>
                            <p class="m-0 mt-1 ms-1">{{$cookie->airline}}</p>
                        </div>

                        <div class="d-flex col-12">
                            <p class="m-0 mt-1 fw-500">{{__('Рейс:')}}</p>
                            <p class="m-0 mt-1 ms-1">{{$cookie->flight_num}}</p>
                        </div>

                        <div class="d-flex col-12">
                            <p class="m-0 mt-1 fw-500">{{__('Дата вылета:')}}</p>
                            <p class="m-0 mt-1 ms-1">{{date("d M Y", $cookie->depart_datetime)}}</p>
                        </div>
                        <div class="d-flex col-12">
                            <p class="m-0 mt-1 fw-500">{{__('Дата прибытия:')}}</p>
                            <p class="m-0 mt-1 ms-1">{{date("d M Y", $cookie->arrival_datetime)}}</p>
                        </div>

                        <hr class="mt-3">

                        <div class="col-12">
                            <p class="fw-600"><i class="fas fa-male me-2"></i> {{__('Пассажиры:')}}</p>
                        </div>

                        <div class="d-flex col-12">
                            <p class="m-0 mt-1 fw-500">{{__('Всего количество:')}}</p>
                            @php $passengers_amount=explode(' ', $cookie->passengers_amount) @endphp
                            <p class="m-0 mt-1 ms-1">{{$passengers_amount[0]}}</p>
                        </div>

                        @php
                            $passengers_cnt=0;
                            $passengers_max=explode(' ',$cookie->passengers_amount);
                        @endphp
                        @foreach($cookie->user_data->user as $user)
                            @php $passengers_cnt++; @endphp
                            <div class="row">
                                <p class="fw-500 mb-2">{{$passengers_cnt}} passenger - {{__($user->type.'_')}} / {{$passengers_cnt}} пассажир - {{$user->type}}</p>
                            </div>
                            <div class="row pb-2 @if($passengers_cnt!=$passengers_max[0]) mb-2 border-bottom @endif">
                                <div class="col-4">
                                    <p class="fw-500 mb-2">Passenger / Пассажир</p>
                                    <p class="fw-400 mb-0">{{$user->surname}} {{$user->name}}</p>
                                </div>
                                <div class="col-4">
                                    <p class="fw-500 mb-2">Birthday / Дата рождения</p>
                                    <p class="fw-400 mb-0">{{$user->date_of_birth}}</p>
                                </div>
                                <div class="col-4">
                                    <p class="fw-500 mb-2">Document / Документ</p>
                                    <p class="fw-400 mb-0">{{$user->serial_number}}</p>
                                </div>
                            </div>
                        @endforeach

                        <hr class="mt-3">

                        <div class="col-12">
                            <p class="fw-600"><i class="fas fa-phone me-2"></i>{{__('Контактная информация:')}}</p>
                        </div>

                        <div class="col-12">
                            @if($cookie->user_data->phone!=null)
                                <div class="col d-flex">
                                    <p class="m-0 mt-1 fw-500">{{__('Телефон:')}}</p>
                                    <p class="m-0 mt-1 ms-1">{{$cookie->user_data->phone}}</p>
                                </div>
                            @endif
                            <div class="col d-flex">
                                <p class="m-0 mt-1 fw-500">Email:</p>
                                <p class="m-0 mt-1 ms-1">{{$cookie->user_data->email}}</p>
                            </div>
                        </div>

                    </div>
                    <div class="row pt-3">
                        <div class="col-lg-4 col-6 d-lg-flex">
                            <p class="my-auto">{{__('При оплате в рублях:')}}</p>
                            <h4 class="my-auto ms-2 text-center text-lg-start">{{$cookie->booking_price_rub}} ₽</h4>
                        </div>
                        <div class="col-lg-4 col-6 d-lg-flex">
                            <p class="my-auto">{{__('При оплате в евро:')}}</p>
                            <h4 class="my-auto ms-2 text-center text-lg-start">{{$cookie->booking_price_eur}} €</h4>
                        </div>
                        <div class="col-lg-4 col-12 py-4">
                            @if($cookie->booking_price_rub!=0)
                                <link href="https://api.cryptocloud.plus/static/pay_btn/css/app.css" rel="stylesheet" >
                                <vue-widget shop_id="{{$API['ShopID']}}" api_key="{{$API['API_Key']}}" background="#fff" color="#000" border_color="#000" logo="color" currency="{{$API['currency']}}" amount="{{$API['price']}}" text_btn="Pay with CryptoCloud" order_id="{{$token}}" ></vue-widget>
                                <script src="https://api.cryptocloud.plus/static/pay_btn/js/app.js" ></script >
                            @else
                                <a href="{{route('payment.confirm')}}" class="btn btn-primary w-100 h-100">
                                    Продолжить
                                </a>
                            @endif
                        </div>
                        <div class="col-12">
                            <p>Отправляя данную форму вы соглашаетесь с <a href="{{route('policy.index')}}" target="_blank">политикой конфиденциальности</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
