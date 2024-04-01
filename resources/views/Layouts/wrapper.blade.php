<!DOCTYPE html>
<html lang="{{__('lang')}}" class="overflow-x-hidden">
<head>
    <meta charset="utf-8" />
    <title>Trip Avia | Home</title>
    <link rel="icon" type="image/x-icon" href="{{asset('img/favicon/favicon.png')}}">
    <scrpt src="{{asset ('js/app.js')}}" defer></scrpt>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- ================== BEGIN core-css ================== -->
    @vite([
    'resources/css/app.min.css',
    'resources/css/vendor.min.css',
    'resources/css/custom.css',
    'resources/js/app.js',
    'resources/js/app.min.js',
    'resources/js/vendor.min.js',
    ])
    <script src="{{'https://kit.fontawesome.com/0a007e12dc.js'}}" crossorigin="anonymous"></script>
    <script src={{"https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"}}></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600&display=swap');
    </style>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap');
    </style>
    @livewireStyles
    <!-- ================== END core-css ================== -->
</head>
<body class="overflow-x-hidden">
<!-- BEGIN #app -->
<div id="app">

    <!-- BEGIN header -->
    @yield('overlay')
    <div class="header header-float">
        <div class="container d-flex">
            <div class="header-logo">
                <a href="{{asset(route('main.index'))}}" class="logo-link">
                    {{--<span class="logo"></span>--}}<img class="logo border-0 rounded-0" src="{{asset('img/favicon/favicon.png')}}" alt="logo"><b>TripAvia</b> <small>CORPORATE</small>
                </a>
            </div>
            <div class="header-nav">
                <div class="container">
                    <div class="header-nav-item">
                        <a href="{{route('main.index')}}" class="header-nav-link header-link">
                            <p class="first">{{__('Главная')}}</p>
                            <p class="second">{{__('Главная')}}</p>
                        </a>
                    </div>
                    <div class="header-nav-item">
                        <a href="{{route('tariff.index')}}" class="header-nav-link header-link">
                            <p class="first">{{__('Тариф')}}</p>
                            <p class="second">{{__('Тариф')}}</p>
                        </a>
                    </div>
                    <div class="header-nav-item">
                        <a href="{{route('help.index')}}" class="header-nav-link header-link">
                            <p class="first">{{__('Помощь')}}</p>
                            <p class="second">{{__('Помощь')}}</p>
                        </a>
                    </div>
                    <div class="header-nav-item">
                        <a href="{{route('blog.index')}}" class="header-nav-link header-link">
                            <p class="first">{{__('Блог')}}</p>
                            <p class="second">{{__('Блог')}}</p>
                        </a>
                    </div>
                    <div class="header-nav-item">
                        <a href="{{route('reviews.index')}}" class="header-nav-link header-link">
                            <p class="first">{{__('Отзывы')}}</p>
                            <p class="second">{{__('Отзывы')}}</p>
                        </a>
                    </div>
                    <div class="header-nav-item">
                        <a href="{{route('pnrcheck.index')}}" class="header-nav-link header-link">
                            <p class="first">{{__('Проверить бронь')}}</p>
                            <p class="second">{{__('Проверить бронь')}}</p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="header-btn">
                @if(auth()->user()==null)
                    <a href="{{route('login')}}" class="btn btn-primary fw-bold rounded-pill header-link">
                        <p class="first">{{__('Войти')}} <i class="fa fa-arrow-right ms-1 opacity-5"></i></p>
                        <p class="second">{{__('Войти')}} <i class="fa fa-arrow-right ms-1 opacity-5"></i></p>
                    </a>
                @else
                    <a href="{{route('profile.index')}}" class="btn btn-primary fw-bold rounded-pill header-link">
                        <p class="first">{{__('Мой профиль')}} <i class="fa fa-arrow-right ms-1 opacity-5"></i></p>
                        <p class="second">{{__('Мой профиль')}} <i class="fa fa-arrow-right ms-1 opacity-5"></i></p>
                    </a>
                @endif
            </div>

            <div class="my-auto ms-2">
                @if(__('lang')=='ru')
                    <a href="{{route('locale.change', 'en')}}"  class="btn btn-primary rounded-pill header-link">
                        <p class="first">en</p>
                        <p class="second">en</p>
                    </a>
                @elseif(__('lang')=='en')
                    <a href="{{route('locale.change', 'ru')}}"  class="btn btn-primary rounded-pill header-link">
                        <p class="first">ru</p>
                        <p class="second">ru</p>
                    </a>
                @endif
            </div>
            <button class="header-mobile-nav-toggler" type="button" data-toggle="header-mobile-nav">
                <span class="header-mobile-nav-toggler-icon"></span>
            </button>
        </div>
    </div>
    <!-- END header -->

    @yield('content')

    <!-- BEGIN footer -->
    <div class="footer bg-black-100">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-3 mb-4 mb-lg-0">
                    <div class="footer-logo">
                        <span class="footer-logo-text">TripAvia <small>CORPORATE</small></span>
                    </div>
                    <p class="footer-desc">
                    {{__('Ваш надежный партнер в организации поездок. Откройте мир с нашим сервисом по поиску и бронированию авиабилетов для визы. Наши инструменты помогут вам найти оптимальные варианты перелетов, а заботливая поддержка обеспечит беззаботное путешествие')}}
                    </p>
                    <h4 class="footer-title">{{__('Мы в социальных сетях')}}</h4>
                    <div class="row">
                        <div class="footer-media-list col-6">
                            <a href="#" class="me-1"><i class="fab fa-lg fa-facebook fa-fw"></i></a>
                            <a href="#" class="me-2"><i class="fab fa-lg fa-instagram fa-fw"></i></a>
                            <a href="#" class="me-2"><i class="fab fa-lg fa-twitter fa-fw"></i></a>
                            <a href="#" class="me-2"><i class="fab fa-lg fa-youtube fa-fw"></i></a>
                            <a href="#" class="me-2"><i class="fab fa-lg fa-linkedin fa-fw"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4 mb-lg-0 d-flex">
                    <div class="col mb-4 mb-lg-0">
                        <h4 class="footer-title">{{__('Помощь')}}</h4>
                        <ul class="footer-link-list">
                            <li><a href="{{route('help.index')}}">{{__('Частозадаваемые вопросы')}}</a></li>
                        </ul>
                        <br>
                        <h4 class="footer-title">{{__('Сотрудничество')}}</h4>
                        <ul class="footer-link-list">
                            <li><a href="#">{{__('Партнерская программа')}}</a></li>
                        </ul>
                    </div>
                    <div class="col mb-4 mb-lg-0 ps-5">
                        <h4 class="footer-title">{{__('Клиентам')}}</h4>
                        <ul class="footer-link-list">
                            <li><a href="{{route('tariff.index')}}">{{__('Тариф')}}</a></li>
                            <li><a href="{{route('blog.index')}}">{{__('Блог')}}</a></li>
                            <li><a href="{{route('reviews.index')}}">{{__('Отзывы')}}</a></li>
                            <li><a href="{{route('pnrcheck.index')}}">{{__('Проверить бронь')}}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <div class="col mb-4 mb-lg-0">
                        <h4 class="footer-title mb-3">{{__('Способы оплаты')}}</h4>
                        <div class="container ps-0">
                            <div class="row">
                                <div class="col-4 d-flex">
                                    <img class="h-35px mb-2 mx-auto" src="{{asset('img/visa.webp')}}" alt="visa">
                                </div>
                                <div class="col-4 d-flex">
                                    <img class="h-35px mb-2 mx-auto" src="{{asset('img/mastercard.webp')}}" alt="mastercard">
                                </div>
                                <div class="col-4 d-flex">
                                    <img class="h-35px mb-2 mx-auto" src="{{asset('img/mir.webp')}}" alt="mir">
                                </div>
                                <div class="col-4 d-flex">
                                    <img class="h-35px mb-2 mx-auto" src="{{asset('img/sberpay.webp')}}" alt="mir">
                                </div>
                                <div class="col-4 d-flex">
                                    <img class="h-35px mb-2 mx-auto" src="{{asset('img/unionpay.webp')}}" alt="mir">
                                </div>
                                <div class="col-4 d-flex">
                                    <img class="h-35px mb-2 mx-auto" src="{{asset('img/webmoney.webp')}}" alt="mir">
                                </div>
                                <div class="col-4 d-flex">
                                    <img class="h-35px mb-2 mx-auto" src="{{asset('img/sbp.webp')}}" alt="mir">
                                </div>
                                <div class="col-4 d-flex">
                                    <img class="h-35px mb-2 mx-auto" src="{{asset('img/qiwi.webp')}}" alt="mir">
                                </div>
                                <div class="col-4 d-flex">
                                    <img class="h-35px mb-2 mx-auto" src="{{asset('img/crypto.webp')}}" alt="mir">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            {{--
            <div class="footer-copyright border-gray-500">
                <div class="row">
                    <div class="col-lg-6 text-center text-lg-start mb-3 mb-lg-0">
                        <div class="footer-copyright-text">&copy; 2016 - 2023 Color Admin All Rights Reserved</div>
                    </div>
                </div>
            </div>
            --}}
        </div>
    </div>
    <!-- END footer -->
</div>
<!-- end page container -->

</body>
</html>
@yield('scripts')
@livewireScripts
