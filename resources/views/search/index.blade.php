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
                        @include('blocks.search')
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
    <div class="section d-lg-none bg-light py-0" style="height: 220px;">
    </div>
    <div class="section bg-light py-3 d-lg-none">
        <div class="container">
            <button class="btn border-primary border-2 bg-primary-100 text-primary w-100 d-flex shadow h-50px justify-content-center" id="filter-btn">
                <i class="fas fa-filter my-auto"></i>
                <p class="my-auto ms-2">Фильтр</p>
            </button>
        </div>
    </div>
    <!-- BEGIN section -->
    <div class="section pt-0 bg-light min-vh-100 pt-lg-5">
        <!-- BEGIN container -->
        <div class="container px-0">
            <!-- BEGIN row -->
            <div class="mb-5 row row-cols-lg-12 w-100 mx-auto">
                {{--FILTER--}}
                <div class="col-lg-3 col ps-lg-0 d-lg-block mb-3" id="filter-div">
                    {{--Filter card--}}
                    <div class="card border-0 shadow mb-3">
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
                    <div class="card border-0 shadow mb-3">
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
                    <div class="card border-0 shadow mb-3">
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

                <div class="col-lg-9 pe-lg-0">
                    @php $cnt=0 @endphp
                @foreach($i=[1,2,3,4,5,6] as $ii)
                        <div class="card border-0 shadow mb-3">
                            <div class="card-body pb-lg-3 pb-5">
                                <div class="row">
                                    <div class="col-lg">
                                        {{--HEADER--}}
                                        <div class="d-flex">
                                            <div class="rounded-circle overflow-hidden bg-primary w-25px h-25px my-auto">
                                                <img class="w-100 h-100" src="http://127.0.0.1:8000/img/SU.png" alt="avia">
                                            </div>
                                            <p class="m-auto ms-2">Аэрофлот</p>
                                        </div>
                                        {{--/HEADER--}}
                                        {{--BODY--}}
                                        @if($ii%2==1)
                                            @php $cnt++ @endphp
                                        @endif
                                        <div style="display: block;" id="details-short-{{$cnt}}">
                                            <div class="row row-cols-lg-4 mt-3" >
                                                <div class="col">
                                                    <div class="container">
                                                        <p class="text-dark mb-0">21 января, вс</p>
                                                        <h2 class="fw-400 my-1 ff-montserrat">18:25</h2>
                                                        <p class="text-dark fw-300 mt-0">Россия, Новосибирск (OVB)</p>
                                                    </div>
                                                </div>
                                                <div class="col d-flex opacity-25">
                                                    <div class="bg-black w-100 my-auto position-relative" style="height: 2px">
                                                        @if($ii%2==1)
                                                            <div class="position-absolute bg-white m-auto rounded-circle border-2 border-black border" style="width: 10px; height: 10px; left: 0; right: 0; top: 0; bottom: 0"></div>
                                                        @endif
                                                    </div>
                                                    <i class="fas fa-caret-right my-auto"></i>
                                                </div>
                                                <div class="col">
                                                    <div class="container">
                                                        <p class="text-dark mb-0">21 января, вс</p>
                                                        <h2 class="fw-400 my-1 ff-montserrat">18:55</h2>
                                                        <p class="text-dark fw-300 mt-0 fs-12px">Россия, Москва (MOW)</p>
                                                    </div>
                                                </div>
                                                <div class="col d-none d-lg-block">
                                                    <div class="container">
                                                        <p class="fw-500 mb-0">4 ч 30 мин</p>
                                                        <p class="fw-400 fs-12px text-green mb-0">прямой</p>
                                                        <p class="fw-400 fs-12px text-black-200">Рейс SU-1461</p>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        @if($ii%2==1)
                                            <div style="display: none" id="details-long-{{$cnt}}">
                                                <div class="row row-cols-lg-4 mt-3" >
                                                    <div class="col">
                                                        <div class="container">
                                                            <p class="text-dark mb-0">21 января, вс</p>
                                                            <h2 class="fw-400 my-1 ff-montserrat">18:25</h2>
                                                            <p class="text-dark fw-300 mt-0">Россия, Новосибирск (OVB)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col d-flex opacity-25">
                                                        <div class="bg-black w-100 my-auto position-relative" style="height: 2px">
                                                        </div>
                                                        <i class="fas fa-caret-right my-auto"></i>
                                                    </div>
                                                    <div class="col">
                                                        <div class="container">
                                                            <p class="text-dark mb-0">21 января, вс</p>
                                                            <h2 class="fw-400 my-1 ff-montserrat">06:55</h2>
                                                            <p class="text-dark fw-300 mt-0 fs-12px">Россия, Москва (MOW)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col d-none d-lg-block">
                                                        <div class="container">
                                                            <p class="fw-500 mb-0">4 ч 30 мин</p>
                                                            <p class="fw-400 fs-12px text-green mb-0">прямой</p>
                                                            <p class="fw-400 fs-12px text-black-200">Рейс SU-1461</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="container">
                                                    <div class="card bg-light border-light">
                                                        <div class="card-body row text-black-200 py-2">
                                                            <div class="col d-flex">
                                                                <i class="far fa-clock my-auto"></i>
                                                                <p class="m-0 my-auto ms-2">Пересадка</p>
                                                            </div>
                                                            <div class="col d-flex justify-content-end">
                                                                <p class="m-0 my-auto">3 ч 20 мин</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row row-cols-lg-4 mt-3">
                                                    <div class="col">
                                                        <div class="container">
                                                            <p class="text-dark mb-0">21 января, вс</p>
                                                            <h2 class="fw-400 my-1 ff-montserrat">18:25</h2>
                                                            <p class="text-dark fw-300 mt-0">Россия, Новосибирск (OVB)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col d-flex opacity-25">
                                                        <div class="bg-black w-100 my-auto position-relative" style="height: 2px">
                                                        </div>
                                                        <i class="fas fa-caret-right my-auto"></i>
                                                    </div>
                                                    <div class="col">
                                                        <div class="container">
                                                            <p class="text-dark mb-0">21 января, вс</p>
                                                            <h2 class="fw-400 my-1 ff-montserrat">06:55</h2>
                                                            <p class="text-dark fw-300 mt-0 fs-12px">Россия, Москва (MOW)</p>
                                                        </div>
                                                    </div>
                                                    <div class="col d-none d-lg-block">
                                                        <div class="container">
                                                            <p class="fw-500 mb-0">4 ч 30 мин</p>
                                                            <p class="fw-400 fs-12px text-green mb-0">прямой</p>
                                                            <p class="fw-400 fs-12px text-black-200">Рейс SU-1461</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        {{--/BODY--}}
                                    </div>
                                    <div class="col-1 p-0 bg-black opacity-20 d-none d-lg-block" style="width: 1px;"></div>
                                    <div class="bg-black opacity-20 d-block d-lg-none w-100 mb-3" style="height: 1px;"></div>
                                    {{--PRICE--}}
                                    <div class="col-lg-3">
                                        <div class="container h-100">
                                            <div class="h-100 d-flex d-lg-block justify-content-between">
                                                <div class="d-lg-none">
                                                    <p class="fw-500 mb-0">4 ч 30 мин</p>
                                                    <p class="fw-400 fs-12px text-green mb-0">прямой</p>
                                                    <p class="fw-400 fs-12px text-black-200">Рейс SU-1461</p>
                                                </div>
                                                <div class="row my-auto">
                                                    <h2 class="fw-500 my-lg-1 fs-22px ff-montserrat text-lg-center text-end mt-lg-3">11 261 ₽</h2>
                                                </div>
                                                <div class="row mt-lg-5 d-flex position-relative">
                                                    <button class="btn-primary btn fs-12px h-55px m-auto">Забронировать</button>
                                                    @if($ii%2==1)
                                                        <div class="d-flex mt-lg-3 justify-content-center details mt-2">
                                                            <a class="text-primary cursor-pointer w-100" onclick="details({{$cnt}})"><i class="fas fa-chevron-down filter-btn" id="details-btn-marker-{{$cnt}}"></i> Детали перелета</a>
                                                        </div>
                                                    @endif
                                                </div>
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
        });

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
        });

        $('#filter-btn').on('click', function (){
            $('#filter-div').slideToggle( "fast", function() {});
        });

        let marker=[];

        for(let j=1; j<={{$cnt}}; j++)
        {
            marker[j]=0;
        }

        function details(cnt)
        {
            if(marker[cnt]==0)
            {
                $('#details-btn-marker-'+cnt).addClass('rotate-btn');
                $('#details-short-'+cnt).slideToggle( "fast", function() {});
                $('#details-long-'+cnt).slideToggle( "fast", function() {});

                marker[cnt]++;
            }
            else
            {
                $('#details-btn-marker-'+cnt).removeClass('rotate-btn');
                $('#details-short-'+cnt).slideToggle( "fast", function() {});
                $('#details-long-'+cnt).slideToggle( "fast", function() {});
                marker[cnt]--;
            }
        }

    </script>
@endsection

