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
            <p class="opacity-70 text-black text-decoration-underline"><a class="text-black" href="{{route('main.index')}}">Главная</a> / <a class="text-black" href="{{route('confirm-ticket.index')}}">Проверка билета</a></p>
        </div>
    </div>



    <div class="section bg-light pt-3">
        <div class="container">
        </div>
    </div>
@endsection

@section('scripts')
@endsection
