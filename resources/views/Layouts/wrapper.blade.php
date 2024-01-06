<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Color Admin | Home</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- ================== BEGIN core-css ================== -->
    @vite(['resources/css/app.min.css', 'resources/css/vendor.min.css', 'resources/js/app.min.js', 'resources/js/vendor.min.js'])
    <script src="{{'https://kit.fontawesome.com/0a007e12dc.js'}}" crossorigin="anonymous"></script>
    <style>
            input:active, input:hover, input:focus
            {
                outline: 0;
                outline-offset: 0;
                background-color: transparent;
            }

            input:-webkit-autofill {
                transition: all 5000s ease-in-out 0s;
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
            }
    </style>

    <!-- ================== END core-css ================== -->
</head>
<body>
<!-- begin #page-loader -->
<div id="page-loader" class="fade show">
    <span class="spinner"></span>
</div>
<!-- end #page-loader -->
<!-- BEGIN #app -->
<div id="app">

    <!-- BEGIN header -->
    <div class="header header-float">
        <div class="container d-flex">
            <div class="header-logo">
                <a href="#" class="logo-link">
                    <span class="logo"></span><b>ColorAdmin</b> <small>CORPORATE</small>
                </a>
            </div>
            <div class="header-nav">
                <div class="container">
                    <div class="header-nav-item">
                        <a href="#" class="header-nav-link">Тариф</a>
                    </div>
                    <div class="header-nav-item">
                        <a href="#" class="header-nav-link">Помощь</a>
                    </div>
                    <div class="header-nav-item">
                        <a href="#" class="header-nav-link">Блог</a>
                    </div>
                    <div class="header-nav-item">
                        <a href="#" class="header-nav-link">Отзывы</a>
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
                        <span class="footer-logo-text">ColorAdmin <small>CORPORATE</small></span>
                    </div>
                    <p class="footer-desc">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin in orci felis. Phasellus id urna nunc. Nulla sed nibh at libero tincidunt scelerisque sed porttitor lectus.
                    </p>
                    <h4 class="footer-title">Мы в социальных сетях</h4>
                    <div class="row">
                        <div class="footer-media-list col-6">
                            <a href="#" class="me-1"><i class="fab fa-lg fa-facebook fa-fw"></i></a>
                            <a href="#" class="me-2"><i class="fab fa-lg fa-instagram fa-fw"></i></a>
                            <a href="#" class="me-2"><i class="fab fa-lg fa-twitter fa-fw"></i></a>
                            <a href="#" class="me-2"><i class="fab fa-lg fa-youtube fa-fw"></i></a>
                            <a href="#" class="me-2"><i class="fab fa-lg fa-linkedin fa-fw"></i></a>
                        </div>
                        <div class="d-flex d-lg-none col-2">
                            <img class="me-2" src="{{asset('img/visa.svg')}}" alt="visa">
                            <img class="me-2" src="{{asset('img/masterCard.svg')}}" alt="mastercard">
                            <img src="{{asset('img/mir.svg')}}" alt="mir">
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
                <div class="col-lg-3 mb-4 mb-lg-0 d-none d-lg-block">
                    <img class="me-2" src="{{asset('img/visa.svg')}}" alt="visa">
                    <img class="me-2" src="{{asset('img/masterCard.svg')}}" alt="mastercard">
                    <img src="{{asset('img/mir.svg')}}" alt="mir">
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
