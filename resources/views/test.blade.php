@extends('Layouts.wrapper')

@section('content')
    <!-- BEGIN section -->
    <div class="section section-hero">
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
                            Бронирование авиабилетов для визы
                        </h1>
                        <div class="fs-18px text-white text-opacity-80">
                            <br>
                        </div>
                        <!-- END hero-title-desc -->

                        <!-- BEGIN row -->
                        <form class="row text-black mt-4 mb-5 border-4 border rounded-2 border-primary bg-primary shadow">
                            <div class="row col-12 col-lg-10 col-12 bg-white rounded rounded-1 p-0 ms-0 me-1 first_input">
                                <fieldset class="first_input p-0 col-1 h-60px m-0 col-lg col-6">
                                    <legend style="all: revert;" class="fs-12px ms-3 opacity-70">Откуда</legend>
                                    <input class="bg-transparent border-0 ms-2 p-0 h-100" type="text" name="fio">
                                </fieldset>

                                <div class="col-1 p-0 bg-black h-40px m-auto opacity-30 d-none d-lg-block" style="width: 1px;"></div>

                                <div class="w-50px p-0 h-60px m-0 d-flex col-sm-1 d-none d-lg-flex">
                                    <i class="fas fa-exchange-alt m-auto opacity-50"></i>

                                </div>
                                <div class="col-1 p-0 bg-black h-40px m-auto opacity-30 d-none d-lg-block" style="width: 1px;"></div>

                                <fieldset class="second_input p-0 col-1 h-60px m-0 col-lg col-6">
                                    <legend style="all: revert;" class="fs-12px ms-3 opacity-70">Куда</legend>
                                    <input class="bg-transparent border-0 ms-2 p-0 h-100" type="text" name="fio">

                                </fieldset>
                                <div class="col-1 p-0 bg-black h-40px m-auto opacity-30 d-none d-lg-block" style="width: 1px;"></div>

                                <fieldset class="first_input p-0 col-1 h-60px m-0 col-lg col-6">
                                    <legend style="all: revert;" class="fs-12px ms-3 opacity-70">Дата туда</legend>
                                    <input class="bg-transparent border-0 ms-2 p-0 h-100" type="text" name="fio">

                                </fieldset>
                                <div class="col-1 p-0 bg-black h-40px m-auto opacity-30 d-none d-lg-block" style="width: 1px;"></div>

                                <fieldset class="second_input p-0 col-1 h-60px m-0 col-lg col-6">
                                    <legend style="all: revert;" class="fs-12px ms-3 opacity-70">Дата обратно</legend>
                                    <input class="bg-transparent border-0 ms-2 p-0 h-100" type="text" name="fio">

                                </fieldset>
                                <div class="col-1 p-0 bg-black h-40px m-auto opacity-30 d-none d-lg-block" style="width: 1px;"></div>

                                <fieldset class="first_input p-0 col-1 h-60px m-0 col-lg col-6">
                                    <legend style="all: revert;" class="fs-12px ms-3 opacity-70">Пассажиры, класс</legend>
                                    <input class="bg-transparent border-0 ms-2 p-0 h-100" type="text" name="fio">
                                </fieldset>
                            </div>
                            <div class="col w-25 d-flex p-0 bg-primary">
                                <button type="button" class="p-0 btn btn-primary m-auto h-100 w-100">Найти</button>
                            </div>
                        </form>
                        <!-- END row -->
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

    <!-- BEGIN section -->
    <div class="section">
        <!-- BEGIN container -->
        <div class="container">
            <div class="section-subtitle">Последние новости</div>

            <!-- BEGIN row -->
            <div class="row">
                @php $i=[1, 2, 3, 4]; @endphp
                @foreach($i as $ii)
                <!-- BEGIN col-3 -->
                <div class="col-lg-3">
                    <!-- BEGIN news -->
                    <div class="news">
                        <div class="news-media">
                            <div class="news-media-img news-media-img-lg" style="background-image: url({{asset('img/top-view-tourist-items-with-copy-space.jpg')}});"></div>
                        </div>
                        <div class="news-content">
                            <div class="news-title">Новость</div>
                            <div class="news-date">1 января, 2024</div>
                        </div>
                        <a href="#" class="stretched-link"></a>
                    </div>
                    <!-- END news -->
                </div>
                <!-- END col-3 -->
                @endforeach

            </div>
            <!-- END row -->

            <div class="text-center">
                <a href="#" class="section-btn"><i class="fa fa-arrow-right"></i> Все новости</a>
            </div>
        </div>
        <!-- END container -->
    </div>
    <!-- END section -->

    <!-- BEGIN section -->
    <div class="section p-0">
        <!-- BEGIN container -->
        <div class="container">
            <!-- BEGIN section-title -->
            <div class="pt-lg-5 pb-lg-3 text-center">
                <div class="display-6 fw-bolder mb-3 d-flex align-items-center justify-content-center">
                    Как это работает?
                </div>
                <p class="fs-18px mb-5">
                    Забронируйте билет за несколько шагов
                </p>
            </div>
            <!-- END section-title -->
        </div>
        <!-- END container -->
    </div>
    <!-- END section -->

    <!-- BEGIN section -->
    <div class="section pt-0">
        <!-- BEGIN container -->
        <div class="container">
            <!-- BEGIN row -->
            <div class="row gx-5 mb-5">
                <!-- BEGIN col-6 -->
                <div class="col-lg-6">
                    <!-- BEGIN news -->
                    <div class="news rounded-3 overflow-hidden shadow-lg mb-5 mb-lg-0">
                        <div class="news-media mb-0">
                            <div class="news-media-img" style="background-image:url({{asset('img/top-view-tourist-items-with-copy-space.jpg')}});"></div>
                        </div>
                        <div class="news-content px-4 py-4">
                            <div class="news-label"><span class="bg-teal-200 text-teal-800">1 шаг</span></div>
                            <div class="news-title">Текст</div>
                            <div class="news-date">Текст</div>
                        </div>
                        <a href="#" class="stretched-link"></a>
                    </div>
                    <!-- END news -->
                </div>
                <!-- END col-6 -->
                <!-- BEGIN col-6 -->
                <div class="col-lg-6">
                    <div class="row h-100">
                        <div class="col-lg-12 h-50 mb-5 mb-lg-0 pb-lg-3">
                            <!-- BEGIN news -->
                            <div class="news rounded-3 overflow-hidden shadow-lg d-flex h-100 mb-0">
                                <div class="news-content w-50 p-4 d-flex align-items-center">
                                    <div>
                                        <div class="news-label"><span class="bg-warning-200 text-warning-800">2 шаг</span></div>
                                        <div class="news-title">Текст</div>
                                        <div class="news-date">Текст</div>
                                    </div>
                                </div>
                                <div class="news-media w-50 h-100 mb-0">
                                    <div class="news-media-img h-100 pt-0" style="background-image:url({{asset('img/top-view-tourist-items-with-copy-space.jpg')}});"></div>
                                </div>
                                <a href="#" class="stretched-link"></a>
                            </div>
                            <!-- END news -->
                        </div>
                        <div class="col-lg-12 h-50 mb-5 mb-lg-0 pt-lg-3">
                            <!-- BEGIN news -->
                            <div class="news rounded-3 overflow-hidden shadow-lg d-flex h-100 mb-0">
                                <div class="news-media w-50 mb-0">
                                    <div class="news-media-img h-100 pt-0" style="background-image:url({{asset('img/top-view-tourist-items-with-copy-space.jpg')}});"></div>
                                </div>
                                <div class="news-content w-50 p-4 d-flex align-items-center">
                                    <div>
                                        <div class="news-label"><span class="bg-primary-200 text-theme-800">3 шаг</span></div>
                                        <div class="news-title">Текст</div>
                                        <div class="news-date">Текст</div>
                                    </div>
                                </div>
                                <a href="#" class="stretched-link"></a>
                            </div>
                            <!-- END news -->
                        </div>
                    </div>
                </div>
                <!-- END col-6 -->
            </div>
            <!-- END row -->

        </div>
        <!-- END container -->
    </div>
    <!-- END section -->

    <div class="section bg-light">
        <!-- BEGIN container -->
        <div class="container">
            <!-- BEGIN row -->
            <div class="row align-items-center">
                <!-- BEGIN col-6 -->
                <div class="col-lg-6 pe-lg-4 mb-5 mb-lg-0">
                    <div class="section-subtitle">Отзывы</div>
                </div>
                <!-- END col-6 -->

                <!-- BEGIN row -->
                <div class="row">
                    @php $i=[1, 2, 3]; @endphp
                    @foreach($i as $ii)
                        <!-- BEGIN col-3 -->
                        <div class="col-lg-4">
                            <!-- BEGIN reviews -->
                            <div class="card shadow">
                                <div class="card-body h-250px">
                                    <div class="news">
                                        <div class="news-content">
                                            <div class="row">
                                                <div class="news-title col">Отзыв</div>
                                                <p class="news-date col text-end">20 дек, 2023</p>
                                            </div>
                                            <div class="news-label"><span class="bg-teal-200 text-teal-800"><i class="fas fa-star text-teal-400"></i>  4.0</span></div>
                                            <div class="section-desc">
                                                Our suite of developer-friendly products and services help you build, secure, and deliver enterprise-grade apps in less time — for any platform.
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- END reviews -->
                        </div>
                        <!-- END col-3 -->
                    @endforeach
                </div>
                <!-- END row -->
            </div>
            <!-- END row -->
        </div>
        <div class="text-center pt-50px">
            <a href="#" class="section-btn"><i class="fa fa-arrow-right" aria-hidden="true"></i> Все отзывы</a>
        </div>
        <!-- END container -->
    </div>

@endsection
