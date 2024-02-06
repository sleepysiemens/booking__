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
                            Бронирование авиабилетов {{--для визы--}}
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
            <livewire:SearchResults  :request="$request" lazy/>
            <!-- END row -->

        </div>
        <!-- END container -->
    </div>
    <!-- END section -->

@endsection

@section('scripts')
            <script>
                // Интегрируем массив напрямую в JavaScript
                window.airportsData = @json($airports);
                @if(isset($request))
                    window.requestData = @json($request);
                @else
                    window.requestData = {req:' ',origin:'',origin_:'', destination:'', destination_:'', departDate:'', returnDate:'', passengers: {adults: 0, children: 0, infants: 0}, trip_class:0, passengers_amount: '1 пассажир'};
                @endif
                //console.log(window.requestData);
            </script>
@endsection

