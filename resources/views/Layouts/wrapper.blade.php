<!DOCTYPE html>
<html lang="en" class="overflow-x-hidden">
<head>
    <meta charset="utf-8" />
    <title>Trip Avia | Home</title>
    <scrpt src="{{asset ('js/app.js')}}" defer></scrpt>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- ================== BEGIN core-css ================== -->
    @vite([
    'resources/css/app.min.css',
    'resources/css/vendor.min.css',
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
    <style>

        html, body
        {
            font-family: "Roboto" !important;
        }
            input:active, input:hover, input:focus, input, select, select:active, select:hover, select:focus, textarea, textarea:active, textarea:hover, textarea:focus
            {
                outline: 0;
                outline-offset: 0;
                background-color: transparent;
                border: none;
            }

            input:-webkit-autofill {
                transition: all 5000s ease-in-out 0s;
            }

            .details
            {
                width: 200px;
                max-width: none;
                right: 0;
                text-align: center;
            }

            .info-banner
            {
                display: none;
                transition: .3s;
                opacity: 0;
            }

            .sec
            {
                display: none;
                transition: .1s;
                opacity: 1;
            }

            .sec-active
            {
                display: block;
            }

            .info:hover .info-banner
            {
                display: block;
            }

            @media screen and (max-width: 1023px)
            {
                .first_input, .brdr-b-l, .brdr-b-r
                {
                    position: relative;
                }
                 .first_input:after, .brdr-b-l:before, .brdr-b-r:before
                {
                    position: absolute;
                    content: "";
                    background-color: black;
                    opacity: .25;
                }
                .brdr-b-l:before
                {
                    width: 95%;
                    height: 1px;
                    bottom: 0;
                    right: 0;
                }
                .brdr-b-r:before
                {
                    width: 95%;
                    height: 1px;
                    bottom: 0;
                    left: 0;
                }
                .first_input:after
                {
                    height: 90%;
                    width: 1px;
                    right: 0;
                    bottom: 25%;
                    margin: auto;
                }

                #search-form
                {
                    width: 95% !important;
                    margin: auto;
                }

                #filter-div
                {
                    display: none;
                }

                .details
                {
                    position: absolute;
                    top: 100%;
                    width: 90vw;
                }
            }

            .filter-btn
            {
                transition: .3s;
            }

            .rotate-btn
            {
                transform: rotate(180deg);
            }

            .ff-montserrat
            {
                font-family: 'Montserrat' !important;
            }
    </style>

    <!-- ================== END core-css ================== -->
</head>
<body class="overflow-x-hidden">
<!-- begin #page-loader -->
<div id="page-loader" class="fade show">
    <span class="spinner"></span>
</div>
<!-- end #page-loader -->
<!-- BEGIN #app -->
<div id="app">

    <!-- BEGIN header -->
    @yield('overlay')
    <div class="header header-float">
        <div class="container d-flex">
            <div class="header-logo">
                <a href="{{asset(route('main.index'))}}" class="logo-link">
                    <span class="logo"></span><b>TripAvia</b> <small>CORPORATE</small>
                </a>
            </div>
            <div class="header-nav">
                <div class="container">
                    <div class="header-nav-item">
                        <a href="{{route('tariff.index')}}" class="header-nav-link">Тариф</a>
                    </div>
                    <div class="header-nav-item">
                        <a href="{{route('help.index')}}" class="header-nav-link">Помощь</a>
                    </div>
                    <div class="header-nav-item">
                        <a href="{{route('blog.index')}}" class="header-nav-link">Блог</a>
                    </div>
                    <div class="header-nav-item">
                        <a href="{{route('reviews.index')}}" class="header-nav-link">Отзывы</a>
                    </div>
                </div>
            </div>
            <div class="header-btn">
                <a href="#" class="btn btn-primary fw-bold rounded-pill">Войти <i class="fa fa-arrow-right ms-1 opacity-5"></i></a>
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
                        Ваш надежный партнер в организации поездок. Откройте мир с нашим сервисом по поиску и бронированию авиабилетов для визы. Наши инструменты помогут вам найти оптимальные варианты перелетов, а заботливая поддержка обеспечит беззаботное путешествие.                    </p>
                    <h4 class="footer-title">Мы в социальных сетях</h4>
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
                        <h4 class="footer-title">Помощь</h4>
                        <ul class="footer-link-list">
                            <li><a href="#">Частозадаваемые вопросы</a></li>
                        </ul>
                        <br>
                        <h4 class="footer-title">Сотрудничество</h4>
                        <ul class="footer-link-list">
                            <li><a href="#">Партнерская программа</a></li>
                        </ul>
                    </div>
                    <div class="col mb-4 mb-lg-0 ps-5">
                        <h4 class="footer-title">Клиентам</h4>
                        <ul class="footer-link-list">
                            <li><a href="#">Тариф</a></li>
                            <li><a href="#">Блог</a></li>
                            <li><a href="#">Отзывы</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <div class="col mb-4 mb-lg-0">
                        <h4 class="footer-title mb-3">Способы оплаты</h4>
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
