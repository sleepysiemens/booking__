<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Trip Avia | Login</title>
    <link rel="icon" type="image/x-icon" href="{{asset('img/favicon/favicon.png')}}">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <script src={{"https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"}}></script>


    <!-- ================== BEGIN core-css ================== -->
    @vite([
'resources/css/login/app.min.css',
'resources/css/login/vendor.min.css',
'resources/js/app.js',
])
    <!-- ================== END core-css ================== -->
</head>
<body class='pace-top'>


<!-- BEGIN #app -->
<div id="app" class="app">
    <!-- BEGIN login -->
    <div class="login login-with-news-feed">
        <!-- BEGIN news-feed -->
        <div class="news-feed">
            <div class="position-relative w-100 bg-white z-3 text-black fs-20px py-2">
                <a href="{{route('main.index')}}" class="text-decoration-none text-black"><i class="fas fa-arrow-left"></i> На главную</a>
            </div>
            <div class="news-image" style="background-image: url({{asset('img/login-bg-11.jpg')}})"></div>
            <div class="news-caption">
                <h4 class="caption-title"><b>Trip</b>Avia</h4>
                <p>
                    Ваш надежный партнер в организации поездок. Откройте мир с нашим сервисом по поиску и бронированию авиабилетов для визы. Наши инструменты помогут вам найти оптимальные варианты перелетов, а заботливая поддержка обеспечит беззаботное путешествие.                </p>
            </div>
        </div>
        <!-- END news-feed -->

        <!-- BEGIN login-container -->
        <div class="login-container">
            <!-- BEGIN login-header -->
            <div class="login-header mb-30px">
                <div class="brand">
                    <div class="d-flex align-items-center">
                        <span class="logo"></span>
                        <b>Trip</b>Avia
                    </div>
                </div>
                <div class="icon">
                    <i class="fa fa-sign-in-alt"></i>
                </div>
            </div>
            <!-- END login-header -->

            <!-- BEGIN login-content -->
            @yield('content')
            <!-- END login-content -->
        </div>
        <!-- END login-container -->
    </div>
    <!-- END login -->

</div>
<!-- END #app -->

</body>
</html>
