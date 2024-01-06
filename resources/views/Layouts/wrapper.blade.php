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
    <script src="https://kit.fontawesome.com/0a007e12dc.js" crossorigin="anonymous"></script>
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
                .first_input, .second_input
                {
                    position: relative;
                }
                .first_input:before, .first_input:after, .second_input:before
                {
                    position: absolute;
                    content: "";
                    background-color: black;
                    opacity: .25;
                }
                .first_input:before
                {
                    width: 95%;
                    height: 1px;
                    bottom: 0;
                    right: 0;
                }
                .second_input:before
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
                <a href="index.html" class="logo-link">
                    <span class="logo"></span><b>ColorAdmin</b> <small>CORPORATE</small>
                </a>
            </div>
            <div class="header-nav">
                <div class="container">
                    <div class="header-nav-item">
                        <a href="about.html" class="header-nav-link">Тариф</a>
                    </div>
                    <div class="header-nav-item">
                        <a href="products.html" class="header-nav-link">Помощь</a>
                    </div>
                    <div class="header-nav-item">
                        <a href="newsroom.html" class="header-nav-link">Блог</a>
                    </div>
                    <div class="header-nav-item">
                        <a href="careers.html" class="header-nav-link">Отзывы</a>
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
                </div>
                <div class="col-lg-3 mb-4 mb-lg-0">
                    <h4 class="footer-title">Помощь</h4>
                    <ul class="footer-link-list">
                        <li><a href="#">Частозадаваемые вопросы</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 mb-4 mb-lg-0">
                    <h4 class="footer-title">Клиентам</h4>
                    <ul class="footer-link-list">
                        <li><a href="#">Тариф</a></li>
                        <li><a href="#">Блог</a></li>
                        <li><a href="#">Отзывы</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 mb-4 mb-lg-0">
                    <h4 class="footer-title">Сотрудничество</h4>
                    <ul class="footer-link-list">
                        <li><a href="#">Партнерская программа</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="row">
                    <div class="col-lg-6 text-center text-lg-start mb-3 mb-lg-0">
                        <div class="footer-copyright-text">&copy; 2016 - 2023 Color Admin All Rights Reserved</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END footer -->
</div>
<!-- end page container -->

</body>
</html>
