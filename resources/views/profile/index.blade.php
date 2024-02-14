@extends('Layouts.wrapper')

@section('content')
    @include('blocks.welcome')

    <div class="section bg-light">
        <div class="container">
            <div class="row mb-3">
                <div class="col-lg-3 mb-4">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <p class="py-1 mt-1 text-black-200">{{auth()->user()->email}}</p>
                            <div class="bg-black opacity-20 d-block w-100 mb-3" style="height: 1px;"></div>

                            <a class="btn w-100 d-flex btn-white border-0 mb-2 active" id="personal-btn" href="#personal" onclick="section()">
                                <i class="far fa-user my-auto fs-18px text-primary"></i>
                                <p class="my-auto ms-2 fw-400">{{__('Персональные данные')}}</p>
                            </a>
                            <a class="btn w-100 d-flex btn-white border-0 mb-2" id="orders-btn" href="#orders" onclick="section()">
                                <i class="far fa-check-circle my-auto fs-18px text-primary"></i>
                                <p class="my-auto ms-2 fw-400">{{__('Заказы')}}</p>
                            </a>
                            <a class="btn w-100 d-flex btn-white border-0 mb-2" id="passengers-btn" href="#passengers" onclick="section()">
                                <i class="fas fa-list-ul my-auto fs-18px text-primary"></i>
                                <p class="my-auto ms-2 fw-400">{{__('Пассажиры')}}</p>
                            </a>
                            <a class="btn w-100 d-flex btn-white border-0 mb-2" id="partnership-btn" href="#partnership" onclick="section()">
                                <i class="fas fa-wallet my-auto fs-18px text-primary"></i>
                                <p class="my-auto ms-2 fw-400">{{__('Партнерская программа')}}</p>
                            </a>
                            <a class="btn w-100 d-flex btn-white border-0 mb-2" href="{{route('profile.logout')}}">
                                <i class="fas fa-sign-out-alt my-auto fs-18px text-primary"></i>
                                <p class="my-auto ms-2 fw-400">{{__('Выйти')}}</p>
                            </a>
                        </div>
                    </div>

                    <div class="card border-0 shadow mt-4">
                        <div class="card-body">
                            <div class="row">
                                <img class="w-75 m-auto" src="{{ url('/qr-code') }}" alt="QR Code">
                            </div>
                            <div class="row">
                                <a class="m-auto text-center fs-16px fw-500" href="{{route('pnrcheck.index')}}">{{__('Проверка бронирования')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
                @include('blocks.personal')
                @include('blocks.orders')
                @include('blocks.passengers')
                @include('blocks.partnership')

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function section()
        {
            $('.active').removeClass('active');

            setTimeout(function (){
                let section = document.location.href.split('#').pop();
                $('#'+section+'-btn').addClass('active');
                $('.sec').removeClass('sec-active');
                $('#'+section).addClass('sec-active');
            },1)
        }

        let page = document.location.href.split('#').pop();
        $('#'+page+'-btn').addClass('active');
        $('.sec').removeClass('sec-active');
        $('#'+page).addClass('sec-active');
    </script>
@endsection
