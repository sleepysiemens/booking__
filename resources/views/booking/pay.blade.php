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
                    <div class="col-lg-8 col-lg-10 col-lg-12">
                        <!-- BEGIN hero-title-desc -->
                        <h1 class="hero-title mb-3 mt-5 pt-md-5">
                            Бронирование авиабилетов {{--для визы--}}
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
        <div class="container w-50">
            <div class="card border-0 shadow">
                <div class="card-body px-5">
                    <div class="row mt-3">
                        <h2 class="text-center">Оплата заказа</h2>
                    </div>
                    <div class="row mt-3">
                        <h4 class="col-12">О заказе</h4>

                        <div class="col-6">
                            <p class="opacity-50 fs-13px mb-0">Номер заказа</p>
                            <p class="fs-16px mt-1">№{{$request->order_number}}</p>
                        </div>
                        <div class="col-6">
                            <p class="opacity-50 fs-13px mb-0">Сумма заказа</p>
                            <p class="fs-16px mt-1">{{$user_info->total_rub}} ₽/ {{$user_info->total_eur}} €</p>
                        </div>

                        <div class="col-6">
                            <p class="opacity-50 fs-13px mb-0">Направление перелета</p>
                            <p class="fs-16px mt-1">{{$request->origin}} - {{$request->destination}}</p>
                        </div>
                        <div class="col-6">
                            <p class="opacity-50 fs-13px mb-0">Дата вылета</p>
                            <p class="fs-16px mt-1">{{date("Y.m.d", $result->depart_datetime)}}</p>
                        </div>
                        <div class="col-6">
                            <p class="opacity-50 fs-13px mb-0">Кол-во пассажиров</p>
                            <p class="fs-16px mt-1"><i class="fas fa-male my-auto" aria-hidden="true"></i> {{$request->passengers_amount}}</p>
                        </div>
                    </div>

                    @php $pay_methods=[1,2,3] @endphp
                    @foreach($pay_methods as $pay_method)
                        <label class="row card mb-2">
                            <span class="card-body">
                                <span class="row">
                                    <span class="col-1 d-flex">
                                        <input class="m-auto" type="radio" name="pay_method">
                                    </span>

                                    <div class="col-11">
                                        <p class="mb-0">Банковской картой РФ</p>
                                        <p class="opacity-50 fs-14px mb-0">Оплата возможна только картой выпущенной банком РФ</p>
                                    </div>
                                </span>
                            </span>
                        </label>
                    @endforeach

                    <div class="row mt-5">
                        <div class="col-6 d-flex">
                            <p class="my-auto">При оплате в рублях:</p>
                            <h4 class="my-auto ms-2">{{$user_info->total_rub}} ₽</h4>
                        </div>
                        <div class="col-6 d-flex">
                            <p class="my-auto">При оплате в евро:</p>
                            <h4 class="my-auto ms-2">{{$user_info->total_eur}} €</h4>
                        </div>
                    </div>

                    <div class="row mt-5 mb-3">
                        <a href="{{route('payment.index')}}" class="d-flex btn btn-primary h-55px">
                            <p class="m-auto">Оплатить</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
