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
                            Бронирование авиабилетов для визы
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
        <br>
    </div>

    <div class="section bg-light pt-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card shadow border-0">
                        <div class="card-body">
                            <div class="row justify-content-center mt-2">
                                <div class="col-auto">
                                    <h1 class="text-center mb-3">Ожидание билета</h1>
                                    <p class="text-center">Поздравляем! Вы забронировали билет.</p>
                                </div>
                            </div>
                            @if($stage==3)
                                <div class="col-12 col-lg-8 row justify-content-center my-3">
                                    <div class="col-6 d-flex">
                                        <img class="w-100 opacity-70 m-auto" src="{{asset('img/four_check_star_mark_circles-ai.png')}}" alt="img">
                                    </div>
                                </div>
                            @endif
                            <div class="row px-20px mt-3 justify-content-center pb-50px">

                                <div class="col-auto p-0 position-relative">
                                    <div class="rounded-circle w-20px h-20px border border-3 @if($stage==3) border-green @else border-primary @endif ">
                                    </div>
                                    <div class="position-absolute w-100px" style="right: -40px">
                                        <p class="text-center fw-400 @if($stage==3) text-green @else text-primary @endif fs-16px mt-2">Обработка заказа</p>
                                    </div>
                                </div>

                                <div class="col-3 p-0 d-flex">
                                    <div class="w-100 @if($stage>1) @if($stage==3) bg-green @else bg-primary @endif @else bg-black-100 @endif my-auto" style="height: 3px">
                                    </div>
                                </div>

                                <div class="col-auto p-0 position-relative">
                                    <div class="rounded-circle w-20px h-20px border border-3 @if($stage>1) @if($stage==3) border-green @else border-primary @endif @else  border-black-100 @endif">
                                    </div>
                                    <div class="position-absolute w-100px" style="right: -40px">
                                        <p class="text-center fw-400 @if($stage>1) @if($stage==3) text-green @else text-primary @endif @else text-black-100 @endif fs-16px mt-2">Подготовка документов</p>
                                    </div>
                                </div>

                                <div class="col-3 p-0 d-flex">
                                    <div class="w-100 @if($stage>2) @if($stage==3) bg-green @else bg-primary @endif @else bg-black-100 @endif my-auto" style="height: 3px">
                                    </div>
                                </div>

                                <div class="col-auto p-0 position-relative">
                                    <div class="rounded-circle w-20px h-20px border border-3 @if($stage>2) @if($stage==3) border-green @else border-primary @endif @else border-black-100 @endif">
                                    </div>
                                    <div class="position-absolute w-100px" style="right: -40px">
                                        <p class="text-center fw-400 @if($stage>2) @if($stage==3) text-green @else text-primary @endif @else text-black-100 @endif  fs-16px mt-2">Готово</p>
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                @if($stage < 3)
                                    <div class="col-12 col-lg-8 mt-5">
                                        <h4 class="text-center m-0 text-primary opacity-70">Обычно это занимает до 10 минут.</h4>
                                        <img class="w-100" src="{{asset('img/loading.jpg')}}" alt="img">
                                    </div>
                                @else
                                    <div class="row px-20px mt-4">
                                        <div class="col-12 p-0 bg-black m-auto opacity-10" style="height: 2px"></div>
                                    </div>
                                @endif
                            </div>



                            <div class="row mt-4 mb-3 h-50px px-20px">
                                @if($stage>2)
                                    <div class="col">
                                        <button class="d-flex btn btn-primary w-100 h-50px">
                                            <p class="m-auto fs-12px d-block d-sm-none">Скачать билет</p>
                                            <p class="m-auto fs-16px d-none d-lg-block">Скачать билет</p>
                                        </button>
                                    </div>
                                    <div class="col">
                                        <a href="{{route('ticket.index')}}" class="d-flex btn btn-white border-2 w-100 h-50px">
                                            <p class="m-auto fs-12px d-block d-sm-none">Посмотреть билет</p>
                                            <p class="m-auto fs-16px d-none d-lg-block">Посмотреть билет</p>
                                        </a>
                                    </div>
                                @endif
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
