@extends('Layouts.wrapper')

@section('content')
    <div class="section section-hero h-300px">
        <!-- BEGIN section-bg -->
        <div class="section-bg with-cover" style="background-image: url(http://127.0.0.1:8000/img/top-view-tourist-items-with-copy-space.jpg);"></div>
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
                            Бронирование авиабилетов для визы
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

    <div class="section bg-light">
        <div class="container">
            <div class="row mb-3">
                <div class="col-lg-3 mb-4">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <p class="py-1 mt-1 text-black-200">email@email.com</p>
                            <div class="bg-black opacity-20 d-block w-100 mb-3" style="height: 1px;"></div>

                            <a class="btn w-100 d-flex btn-white border-0 mb-2 active" id="personal-btn" href="#personal" onclick="section()">
                                <i class="far fa-user my-auto fs-18px text-primary"></i>
                                <p class="my-auto ms-2 fw-400">Персональные данные</p>
                            </a>
                            <a class="btn w-100 d-flex btn-white border-0 mb-2" id="orders-btn" href="#orders" onclick="section()">
                                <i class="far fa-check-circle my-auto fs-18px text-primary"></i>
                                <p class="my-auto ms-2 fw-400">Заказы</p>
                            </a>
                            <a class="btn w-100 d-flex btn-white border-0 mb-2" id="passengers-btn" href="#passengers" onclick="section()">
                                <i class="fas fa-list-ul my-auto fs-18px text-primary"></i>
                                <p class="my-auto ms-2 fw-400">Пассажиры</p>
                            </a>
                            <a class="btn w-100 d-flex btn-white border-0 mb-2" id="partnership-btn" href="#partnership" onclick="section()">
                                <i class="fas fa-wallet my-auto fs-18px text-primary"></i>
                                <p class="my-auto ms-2 fw-400">Партнерская программа</p>
                            </a>
                            <a class="btn w-100 d-flex btn-white border-0 mb-2" href="#">
                                <i class="fas fa-sign-out-alt my-auto fs-18px text-primary"></i>
                                <p class="my-auto ms-2 fw-400">Выйти</p>
                            </a>
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
