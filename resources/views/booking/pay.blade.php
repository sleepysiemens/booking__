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
                    <div class="row mt-3">
                        <h4 class="col-12">{{__('О заказе')}}</h4>

                        <div class="col-6">
                            <p class="opacity-50 fs-13px mb-0">{{__('Заказчик')}}</p>
                            <p class="fs-16px mt-1">{{$cookie->email}}</p>
                        </div>
                        <div class="col-6">
                            <p class="opacity-50 fs-13px mb-0">{{__('Сумма заказа')}}</p>
                            <p class="fs-16px mt-1">{{$cookie->user_data->total_rub}} ₽/ {{$cookie->user_data->total_eur}} €</p>
                        </div>

                        <div class="col-6">
                            <p class="opacity-50 fs-13px mb-0">{{__('Направление перелета')}}</p>
                            <p class="fs-16px mt-1">{{$cookie->origin}} - {{$cookie->destination}}</p>
                        </div>
                        <div class="col-6">
                            <p class="opacity-50 fs-13px mb-0">{{__('Дата вылета')}}</p>
                            <p class="fs-16px mt-1">{{date("Y.m.d", $cookie->depart_datetime)}}</p>
                        </div>
                        <div class="col-6">
                            <p class="opacity-50 fs-13px mb-0">{{__('Кол-во пассажиров')}}</p>
                            <p class="fs-16px mt-1"><i class="fas fa-male my-auto" aria-hidden="true"></i> {{$cookie->passengers_amount}}</p>
                        </div>
                    </div>

                    @php $pay_methods=[1] @endphp
                    @foreach($pay_methods as $pay_method)
                        <label class="row card mb-2 mt-4">
                            <span class="card-body">
                                <span class="row">
                                    <span class="col-1 d-flex">
                                        <input class="m-auto" type="radio" name="pay_method" required>
                                    </span>

                                    <div class="col-11">
                                        <div class="d-flex">
                                            <p class="my-auto">{{__('Криптовалютой')}}</p>
                                            <img class="h-15px ms-2" src="https://cryptocloud.plus/_nuxt/img/logo.a6a93c4.svg" alt="crypto-cloud">
                                        </div>
                                        {{--<p class="opacity-50 fs-14px mb-0">{{__('Оплата возможна только картой выпущенной банком РФ')}}</p>--}}
                                    </div>
                                </span>
                            </span>
                        </label>
                    @endforeach

                    <div class="row mt-5">
                        <div class="col-6 d-lg-flex">
                            <p class="my-auto">{{__('При оплате в рублях:')}}</p>
                            <h4 class="my-auto ms-2 text-center text-lg-start">{{$cookie->user_data->total_rub}} ₽</h4>
                        </div>
                        <div class="col-6 d-lg-flex">
                            <p class="my-auto">{{__('При оплате в евро:')}}</p>
                            <h4 class="my-auto ms-2 text-center text-lg-start">{{$cookie->user_data->total_eur}} €</h4>
                        </div>
                    </div>

                    <div class="row mt-5 mb-3">
                        <button class="d-flex btn btn-primary h-55px">
                            <p class="m-auto">{{__('Оплатить')}}</p>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
