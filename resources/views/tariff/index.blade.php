@extends('Layouts.wrapper')

@section('content')
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
                            Бронирование авиабилетов {{--для визы--}}
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
    <div class="section bg-light p-3">
        <div class="container">
            <p class="opacity-70 text-black text-decoration-underline"><a class="text-black" href="{{route('main.index')}}">Главная</a> / <a class="text-black" href="{{route('tariff.index')}}">Тариф</a></p>
        </div>
    </div>

    <div class="section bg-light pt-4">
        <div class="container">
            <div class="display-6 fw-bolder mb-3 d-flex align-items-center justify-content-center">
                Тариф
            </div>
            <div class="row mt-4 justify-content-center">
                <div class="col-lg-8 col">
                    <div class="card shadow border-0">
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-12 col-lg-6 d-flex pb-3">
                                    <div class="rounded-circle overflow-hidden bg-light w-45px h-45px my-auto d-flex">
                                        <i class="fas fa-plane-departure m-auto text-black-100 fs-18px" aria-hidden="true"></i>
                                    </div>
                                    <div class="ms-3 my-auto">
                                        <h4 class="m-0">Авиабилеты</h4></div>
                                </div>
                            </div>

                            <div class="row mt-3 px-3">
                                <h6 class="fs-16px">Цена за 1 пассажира:</h6>
                            </div>

                            <div class="row px-3 mt-2">
                                <div class="card bg-light border-0">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col mx-2">
                                                <p class="fw-500">При оплате в рублях:</p>
                                                <h3 class="ff-montserrat">699 ₽</h3>
                                                <p class="fs-14px opacity-70">При оплате картой выпущенной банком РФ оплата в рублях</p>
                                            </div>
                                            <div class="col-1 p-0 bg-black m-auto opacity-10 h-1" style="width: 2px; height: 120px"></div>
                                            <div class="col mx-2">
                                                <p class="fw-500">При оплате в евро:</p>
                                                <h3 class="ff-montserrat">14 €</h3>
                                                <p class="fs-14px opacity-70">В евро оплата производится картой, выпущенной банком любой страны.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row my-3 px-3">
                                <h6 class="col-auto my-auto fs-16px">Срок действия:</h6>
                                <div class="col-auto btn btn-primary d-flex rounded-5 info position-relative">
                                    <div class="position-absolute card bg-black-300 bottom-100 border-0 opacity-90 w-300px info-banner">
                                        <div class="card-body">
                                            <p class="text-white fs-12px m-0">После бронирования авиакомпания может уменьшить тайм-лимит по авиабилетам в одностороннем порядке</p>
                                        </div>
                                    </div>
                                    <p class="m-auto">до 7 дней <i class="ms-1 far fa-question-circle my-auto"></i></p>
                                </div>
                            </div>

                            <div class="row mt-4 px-3">
                                <h6 class="col-auto my-auto fs-16px">Бронь подойдет:</h6>
                                <ul class="mt-3 ms-3 mb-0 fs-16px">
                                    <li>
                                        <p>Для подачи на визу</p>
                                    </li>
                                    <li>
                                        <p>Для предоставления обратного билета в стране вылета\прилета</p>
                                    </li>
                                    <li>
                                        <p>Для любых других целей, где нужна бронь</p>
                                    </li>
                                </ul>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <button class="d-flex btn btn-primary w-100 h-50px">
                                        <p class="m-auto fs-12px d-block d-sm-none">Забронировать</p>
                                        <p class="m-auto fs-16px d-none d-lg-block">Забронировать</p>
                                    </button>
                                </div>
                                <div class="col">
                                    <button class="d-flex btn btn-white border-2 w-100 h-50px">
                                        <p class="m-auto fs-12px d-block d-sm-none">Пример брони (PDF)</p>
                                        <p class="m-auto fs-16px d-none d-lg-block">Пример брони (PDF)</p>
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
