<!DOCTYPE html>
<html lang="en" class="overflow-x-hidden">
<head>
    <meta charset="utf-8" />
    <title>Color Admin | Home</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- ================== BEGIN core-css ================== -->
    @vite(['resources/css/app.min.css', 'resources/css/vendor.min.css', 'resources/js/app.min.js', 'resources/js/vendor.min.js'])
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

    @yield('content')

</div>
<!-- end page container -->

</body>
</html>
@yield('scripts')
