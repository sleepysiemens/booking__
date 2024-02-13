@extends('Layouts.wrapper')

@section('content')
    <div class="section section-hero h-300px">
        <!-- BEGIN section-bg -->
        @php
            $rand=rand(1,3)
        @endphp
        @if($rand==1)
            <div class="section-bg with-cover" style="background-image: url({{asset('img/top-view-tourist-items-with-copy-space.jpg')}});"></div>
        @elseif($rand==2)
            <div class="section-bg with-cover" style="background-image: url({{asset('img/christmas-travel-concept-with-laptop.jpg')}});"></div>
        @elseif($rand==3)
            <div class="section-bg with-cover" style="background-image: url({{asset('img/traveling-tools-with-copy-space.jpg')}});"></div>
        @endif
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
            <p class="opacity-70 text-black text-decoration-underline"><a class="text-black" href="{{route('main.index')}}">Главная</a> / <a class="text-black" href="{{route('pnrcheck.index')}}">Проверка билета</a></p>
        </div>
    </div>

    <div class="section bg-light pt-4">
        <div class="container pb-5">
            <div class="display-6 fw-bolder mb-3 d-flex align-items-center justify-content-center">
                Проверка бронирования
            </div>
            <div class="row mt-4 justify-content-center">
                <div class=" col">
                    <div class="card shadow border-0">
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-12 col-lg-6 d-flex pb-3">
                                    <div class="rounded-circle overflow-hidden bg-light w-45px h-45px my-auto d-flex">
                                        <i class="fas fa-key m-auto text-black-100 fs-18px" aria-hidden="true"></i>
                                    </div>
                                    <div class="ms-3 my-auto">
                                        <h4 class="m-0">Код PNR</h4>
                                    </div>
                                </div>
                            </div>

                            <form class="row px-3 mt-2" method="post" action="{{route('pnrcheck.check')}}">
                                @csrf
                                <div class="col-lg-4 col-12 mb-3">
                                    <fieldset style="all: revert;" class="border border-1 rounded">
                                        <legend style="all: revert;" class="text-black-200 px-2">Код бронирования (PNR)</legend>
                                        <input type="text" name="pnr" class="w-100" value="{{ '' }}">
                                    </fieldset>
                                </div>
                                <div class="col-lg-4 col-12 mb-3">
                                    <fieldset style="all: revert;" class="border border-1 rounded">
                                        <legend style="all: revert;" class="text-black-200 px-2">Фамилия пассажира</legend>
                                        <input type="text" name="surname" class="w-100" value="@if(auth()->user()!=null) {{ auth()->user()->surname }}@endif">
                                    </fieldset>
                                </div>
                                <div class="col-lg-4 col-12 mb-3 mt-2 d-flex">
                                    <button class="btn btn-primary w-100">
                                        Проверить
                                    </button>
                                </div>
                            </form>

                            @if(isset($check))
                                    @if($check)
                                    <div class="row mt-2 px-4">
                                        <div class="card bg-green-100 border-5" style="border-color: rgba(10,255,0,.2)">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-12 d-flex justify-content-start text-green-300">
                                                        <i class="fas fa-check fs-26px"></i>
                                                        <h5 class="my-auto ms-2">Подтверждено</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        <div class="row mt-4">
                                            <div class="col">
                                                <button class="d-flex btn btn-primary w-100 h-50px">
                                                    <p class="m-auto fs-12px d-block d-sm-none">Скачать билет</p>
                                                    <p class="m-auto fs-16px d-none d-lg-block">Скачать билет</p>
                                                </button>
                                            </div>
                                            <div class="col">
                                                <a href="{{route('ticket.index', $order_id)}}" class="d-flex btn btn-white border-2 w-100 h-50px" target="_blank">
                                                    <p class="m-auto fs-12px d-block d-sm-none">Посмотреть билет</p>
                                                    <p class="m-auto fs-16px d-none d-lg-block">Посмотреть билет</p>
                                                </a>
                                            </div>
                                        </div>
                                    @else
                                    <div class="row mt-2 px-4">
                                        <div class="card bg-red-100 border-5" style="border-color: rgba(255,0,0,.2)">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-12 d-flex justify-content-start text-red-300">
                                                        <i class="fas fa-ban fs-26px"></i>
                                                        <h5 class="my-auto ms-2">Не подтверждено</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                            @endif
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
