@extends('Layouts.wrapper')

@section('content')
    <!-- BEGIN section -->
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
                            {{__('Бронирование авиабилетов для визы')}}
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

    <!-- BEGIN section -->
    <div class="section pt-0 bg-light min-vh-100 pt-lg-5">
        <!-- BEGIN container -->
        <div class="container px-0">
            <!-- BEGIN row -->
            <livewire:search_res  :request="$request" lazy/>
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
                    window.requestData = {req:' ',origin:'',origin_:'', destination:'', destination_:'', departDate:'', returnDate:'', passengers: {adults: 1, children: 0, infants: 0}, trip_class:0, passengers_amount: '1 пассажир'};
                @endif
                //console.log(window.requestData);
            </script>

    <script>
        function details(id)
        {
            $( "#ticket-body-"+id ).slideToggle( "slow", function() {});
            $( "#details-div-"+id ).slideToggle( "slow", function() {});
            if (!$('#details-btn-marker-' + id).hasClass('rotate-btn')) {
                $('#details-btn-marker-' + id).addClass('rotate-btn');
            } else {
                $('#details-btn-marker-' + id).removeClass('rotate-btn');
            }
        }
    </script>
@endsection

