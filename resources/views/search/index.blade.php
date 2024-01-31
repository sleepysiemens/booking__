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
            <div class="mb-5 row row-cols-lg-12 w-100 mx-auto">
                @include('blocks.search.filter')

                <div class="col-lg-9 pe-lg-0">
                    @php
                        $cnt=0;
                    @endphp
                    @foreach($results as $result)
                        @include('blocks.search.ticket')
                    @endforeach
                </div>
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
        {{--
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
--}}
    </script>
@endsection

