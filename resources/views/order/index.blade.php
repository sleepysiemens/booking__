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

                            @include('livewire.wait_3_stage')

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
