@extends('Layouts.wrapper')

@section('content')
    <div class="section section-hero h-300px">
        <!-- BEGIN section-bg -->
        <div class="section-bg with-cover" style="background-image: url(http://127.0.0.1:8000/img/top-view-tourist-items-with-copy-space.jpg);"></div>
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
                                    <p class="text-center">Поздравляем! Вы забронировали билет</p>
                                </div>
                            </div>
                            <div class="row px-20px mt-3 justify-content-center pb-50px">

                                <div class="col-auto p-0 position-relative">
                                    <div class="rounded-circle w-20px h-20px border border-3 border-primary">
                                    </div>
                                    <div class="position-absolute w-100px" style="right: -40px">
                                        <p class="text-center fw-400 text-primary fs-16px mt-2">обработка заказа</p>
                                    </div>
                                </div>

                                <div class="col-3 p-0 d-flex">
                                    <div class="w-100 @if($stage>1) bg-primary @else bg-black-100 @endif my-auto" style="height: 3px">
                                    </div>
                                </div>

                                <div class="col-auto p-0 position-relative">
                                    <div class="rounded-circle w-20px h-20px border border-3 @if($stage>1) border-primary @else border-black-100 @endif">
                                    </div>
                                    <div class="position-absolute w-100px" style="right: -40px">
                                        <p class="text-center fw-400 @if($stage>1) text-primary @else text-black-100 @endif fs-16px mt-2">подготовка документов</p>
                                    </div>
                                </div>

                                <div class="col-3 p-0 d-flex">
                                    <div class="w-100 @if($stage>2) bg-primary @else bg-black-100 @endif my-auto" style="height: 3px">
                                    </div>
                                </div>

                                <div class="col-auto p-0 position-relative">
                                    <div class="rounded-circle w-20px h-20px border border-3 @if($stage>2) border-primary @else border-black-100 @endif">
                                    </div>
                                    <div class="position-absolute w-100px" style="right: -40px">
                                        <p class="text-center fw-400 @if($stage>2) text-primary @else text-black-100 @endif  fs-16px mt-2">готово</p>
                                    </div>
                                </div>
                            </div>

                            <div class="row px-20px mt-5">
                                <div class="col-12 p-0 bg-black m-auto opacity-10" style="height: 2px"></div>
                            </div>

                            <div class="row mt-5 h-50px px-20px">
                                @if($stage>2)
                                    <div class="col">
                                        <button class="d-flex btn btn-primary w-100 h-50px">
                                            <p class="m-auto fs-12px d-block d-sm-none">Скачать билет</p>
                                            <p class="m-auto fs-16px d-none d-lg-block">Скачать билет</p>
                                        </button>
                                    </div>
                                    <div class="col">
                                        <button class="d-flex btn btn-white border-2 w-100 h-50px">
                                            <p class="m-auto fs-12px d-block d-sm-none">Посмотреть билет</p>
                                            <p class="m-auto fs-16px d-none d-lg-block">Посмотреть билет</p>
                                        </button>
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
