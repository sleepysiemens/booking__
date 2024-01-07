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
                            Бронирование авиабилетов для визы
                        </h1>
                        <!-- END hero-title-desc -->

                        <!-- BEGIN row -->
                        <form class="row text-black mt-4 mb-5 border-4 border rounded-2 border-primary bg-primary shadow position-absolute w-100 z-2">
                            <div class="row col-12 col-lg-10 col-12 bg-white rounded rounded-1 p-0 ms-0 me-1">
                                <fieldset class="first_input brdr-b-l p-0 col-1 h-60px m-0 col-lg col-6">
                                    <legend style="all: revert;" class="fs-12px ms-3 opacity-70">Откуда</legend>
                                    <input class="bg-transparent border-0 ms-2 p-0 h-100" type="text" name="fio">
                                </fieldset>

                                <div class="col-1 p-0 bg-black h-40px m-auto opacity-30 d-none d-lg-block" style="width: 1px;"></div>

                                <div class="w-50px p-0 h-60px m-0 d-flex col-sm-1 d-none d-lg-flex">
                                    <i class="fas fa-exchange-alt m-auto opacity-50"></i>

                                </div>
                                <div class="col-1 p-0 bg-black h-40px m-auto opacity-30 d-none d-lg-block" style="width: 1px;"></div>

                                <fieldset class="brdr-b-r p-0 col-1 h-60px m-0 col-lg col-6">
                                    <legend style="all: revert;" class="fs-12px ms-3 opacity-70">Куда</legend>
                                    <input class="bg-transparent border-0 ms-2 p-0 h-100" type="text" name="fio">

                                </fieldset>
                                <div class="col-1 p-0 bg-black h-40px m-auto opacity-30 d-none d-lg-block" style="width: 1px;"></div>

                                <fieldset class="first_input brdr-b-l p-0 col-1 h-60px m-0 col-lg col-6">
                                    <legend style="all: revert;" class="fs-12px ms-3 opacity-70">Дата туда</legend>
                                    <input class="bg-transparent border-0 ms-2 p-0 h-100" type="text" name="fio">

                                </fieldset>
                                <div class="col-1 p-0 bg-black h-40px m-auto opacity-30 d-none d-lg-block" style="width: 1px;"></div>

                                <fieldset class="brdr-b-r p-0 col-1 h-60px m-0 col-lg col-6">
                                    <legend style="all: revert;" class="fs-12px ms-3 opacity-70">Дата обратно</legend>
                                    <input class="bg-transparent border-0 ms-2 p-0 h-100" type="text" name="fio">

                                </fieldset>
                                <div class="col-1 p-0 bg-black h-40px m-auto opacity-30 d-none d-lg-block" style="width: 1px;"></div>

                                <fieldset class="first_input p-0 col-1 h-60px m-0 col-lg col-6">
                                    <legend style="all: revert;" class="fs-12px ms-3 opacity-70">Пассажиры, класс</legend>
                                    <input class="bg-transparent border-0 ms-2 p-0 h-100" type="text" name="fio">
                                </fieldset>
                            </div>
                            <div class="col w-25 d-flex p-0 bg-primary h-50px h-lg-60px">
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
    <div class="section d-lg-none h-250px bg-light">
    </div>
    <!-- BEGIN section -->
    <div class="section pt-0 bg-light min-vh-100 pt-lg-5">
        <!-- BEGIN container -->
        <div class="container">
            <!-- BEGIN row -->
            <div class="row mb-5">
                {{--FILTER--}}
                <div class="col-3 ps-0">
                    {{--Filter card--}}
                    <div class="card shadow mb-3">
                        <div class="card-body">
                            <div class="row">
                                <p class="fs-16px col mb-0">Пересадки</p>
                                <a class="col-2 text-black opacity-50 d-flex filter-btn cursor-pointer" id="transfer-btn">
                                    <i class="fas fa-chevron-down m-auto"></i>
                                </a>
                            </div>
                            <div class="container" id="transfer">
                                @foreach($i=[1,2] as $ii)
                                    <div class="row pt-3">
                                        <input class="col-1 h-20px my-auto" type="checkbox" id="transfer-{{$ii}}">
                                        <label class="col-auto" for="transfer-{{$ii}}"><p class="m-auto">Без пересадок</p></label>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                    {{--/Filter card--}}

                    {{--Filter card--}}
                    <div class="card shadow mb-3">
                        <div class="card-body">
                            <div class="row">
                                <p class="fs-16px col mb-0">Авиакомпании</p>
                                <a class="col-2 text-black opacity-50 d-flex filter-btn cursor-pointer" id="avia-btn">
                                    <i class="fas fa-chevron-down m-auto"></i>
                                </a>
                            </div>
                            <div class="container" id="avia">
                                @foreach($i=[1,2] as $ii)
                                    <div class="row pt-3">
                                        <input class="col-1 h-20px my-auto" type="checkbox" id="company-{{$ii}}">
                                        <label class="col-auto d-flex" for="company-{{$ii}}">
                                            <div class="rounded-circle overflow-hidden bg-primary w-25px h-25px my-auto">
                                                <img class="w-100 h-100" src="{{asset('img/SU.png')}}" alt="avia">
                                            </div>
                                            <p class="m-auto ms-2">Аэрофлот</p>
                                        </label>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                    {{--/Filter card--}}

                    {{--Filter card--}}
                    <div class="card shadow mb-3">
                        <div class="card-body">
                            <div class="row">
                                <p class="fs-16px col mb-0">Вылет и прибытие</p>
                                <a class="col-2 text-black opacity-50 d-flex filter-btn cursor-pointer" id="flight-btn">
                                    <i class="fas fa-chevron-down m-auto"></i>
                                </a>
                            </div>
                            <div class="container pt-2" id="flight">
                                <p class="opacity-70">Вылет</p>
                                <div class="row mb-3">
                                    <input class="col-5 m-auto border-primary rounded py-2 fs-16px" type="time">
                                    <p class="col-auto m-auto">-</p>
                                    <input class="col-5 m-auto border-primary rounded py-2 fs-16px" type="time">
                                </div>

                                <p class="opacity-70">Прибытие</p>
                                <div class="row mb-3">
                                    <input class="col-5 m-auto border-primary rounded py-2 fs-16px" type="time">
                                    <p class="col-auto m-auto">-</p>
                                    <input class="col-5 m-auto border-primary rounded py-2 fs-16px" type="time">
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--/Filter card--}}
                    <div class="container fs-16px text-primary">
                        <a><i class="fas fa-times"></i> Сбросить фильтр</a>
                    </div>
                </div>
                {{--/FILTER--}}

                <div class="col-9 pe-0">
                @foreach($i=[1,2,3,4,5,6] as $ii)
                        <div class="card shadow mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        {{--HEADER--}}
                                        <div class="d-flex">
                                            <div class="rounded-circle overflow-hidden bg-primary w-25px h-25px my-auto">
                                                <img class="w-100 h-100" src="http://127.0.0.1:8000/img/SU.png" alt="avia">
                                            </div>
                                            <p class="m-auto ms-2">Аэрофлот</p>
                                        </div>
                                        {{--/HEADER--}}
                                        {{--BODY--}}
                                        <div class="row mt-3">
                                            <div class="col">
                                                <div class="container">
                                                    <p class="text-dark mb-0">21 января, вс</p>
                                                    <h2 class="fw-400 my-1">18:25</h2>
                                                    <p class="text-dark fw-300 mt-0">Россия, Новосибирск (OVB)</p>
                                                </div>
                                            </div>
                                            <div class="col-2 d-flex opacity-25">
                                                <div class="bg-black w-100 my-auto" style="height: 2px"></div>
                                                <i class="fas fa-caret-right my-auto"></i>
                                            </div>
                                            <div class="col">
                                                <div class="container">
                                                    <p class="text-dark mb-0">21 января, вс</p>
                                                    <h2 class="fw-400 my-1">18:55</h2>
                                                    <p class="text-dark fw-300 mt-0">Россия, Москва (MOW)</p>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="container">
                                                    <p class="fw-500 mb-0">4 ч 30 мин</p>
                                                    <p class="fw-400 fs-12px text-green mb-0">прямой</p>
                                                    <p class="fw-400 fs-12px text-black-200">Рейс SU-1461</p>
                                                </div>
                                            </div>
                                        </div>
                                        {{--/BODY--}}
                                    </div>
                                    <div class="col-1 p-0 bg-black opacity-20 d-none d-lg-block" style="width: 1px;"></div>
                                    {{--PRICE--}}
                                    <div class="col-2">
                                        <div class="container h-100">
                                            <div class="row h-25">
                                                <h2 class="fw-400 my-1 fs-22px">11 261 ₽</h2>
                                            </div>
                                            <div class="row h-75 d-flex">
                                                <button class="btn-primary btn fs-12px h-55px m-auto">Забронировать</button>
                                            </div>
                                        </div>
                                    </div>
                                    {{--/PRICE--}}
                                </div>
                            </div>
                        </div>
                @endforeach
                </div>

            </div>
            <!-- END row -->

        </div>
        <!-- END container -->
    </div>
    <!-- END section -->

@endsection
@section('scripts')
    <script>
        let transfer=0;
        $('#transfer-btn').on('click', function (){
            $('#transfer').slideToggle( "fast", function() {});
            if(transfer==0)
            {
                $('#transfer-btn').addClass('rotate-btn');
                transfer++;
            }
            else
            {
                $('#transfer-btn').removeClass('rotate-btn');
                transfer--;
            }
        });

        let avia=0;
        $('#avia-btn').on('click', function (){
            $('#avia').slideToggle( "fast", function() {});
            if(avia==0)
            {
                $('#avia-btn').addClass('rotate-btn');
                avia++;
            }
            else
            {
                $('#avia-btn').removeClass('rotate-btn');
                avia--;
            }
        })

        let flight=0;
        $('#flight-btn').on('click', function (){
            $('#flight').slideToggle( "fast", function() {});
            if(flight==0)
            {
                $('#flight-btn').addClass('rotate-btn');
                flight++;
            }
            else
            {
                $('#flight-btn').removeClass('rotate-btn');
                flight--;
            }
        })
    </script>
@endsection

