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
            <p class="opacity-70 text-black text-decoration-underline">
                <a class="text-black" href="{{route('main.index')}}">Главная</a>
                /
                <a class="text-black" href="{{route('blog.index',1)}}">Отзывы</a>
            </p>
        </div>
    </div>

    <div class="section bg-light pt-4">
        <div class="container">
            <div class="row">
                <h1 class="col-9">Отзывы</h1>
                <div class="col-3">
                    <a class="btn btn-primary d-flex justify-content-center py-3" onclick="toggle_review()">
                        <i class="fas fa-plus my-auto me-2"></i>
                        <p class="my-auto ">Оставить отзыв</p>
                    </a>
                </div>
            </div>

            <div class="row">
                @foreach($reviews as $review)
                    <div class="col-12 col-lg-4 mt-4">
                        <a href="{{asset(route('blog.show'))}}" class="card shadow border-0 overflow-hidden cursor-pointer">
                            <div class="card-body">
                                <div class="row py-2 mt-1 justify-content-between">
                                    <h6 class="col my-auto fs-20px">{{$review->name}} {{$review->surname}}</h6>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-auto">
                                        <span class="btn btn-primary border-0 d-flex justify-content-center">
                                            <i class="fas fa-star my-auto text-white opacity-75 me-2 fs-12px"></i>
                                            <p class="my-auto text-white fw-600 fs-12px">{{$review->rating}}</p>
                                        </span>
                                    </div>
                                    <div class="col-auto">
                                        <span class="btn btn-light border-0 d-flex justify-content-center">
                                            <i class="fas fa-check my-auto text-black opacity-50 me-1 fs-12px"></i>
                                            <p class="my-auto text-black fw-300 opacity-50 fs-12px">Есть ответ</p>
                                        </span>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <p class="opacity-80">
                                        {{$review->text}}
                                    </p>
                                </div>
                                <div class="row mt-3">
                                    <p class="text-black-200 fs-12px m-0">{{date("d.m.Y H:i",strtotime($review->created_at))}}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection

@section('overlay')
    <div class="position-fixed bg-black bg-opacity-10 d-flex d-none" style="width: 100vw; height: 100vh; z-index: 1050" id="review_form">
        <div class="card m-auto w-500px">
            <div class="card-body position-relative">
                <button class="position-absolute btn d-flex" style="right: 0; top: 0" onclick="toggle_review()">
                    <i class="fas fa-times m-auto fs-18px opacity-55"></i>
                </button>
                <form method="post" action="{{asset(route('reviews.store'))}}" class="pb-3">
                    @csrf
                    <div class="row mt-3">
                        <h1 class="fs-22px text-center">Оставить отзыв</h1>
                    </div>
                    <div class="row mt-3 px-4">
                        <input class="input-group border h-35px rounded-1" placeholder="Имя" name="name" required>
                    </div>
                    <div class="row mt-3 px-4">
                        <input class="input-group border h-35px rounded-1" placeholder="Фамилия" name="surname" required>
                    </div>
                    <div class="row mt-3 px-4">
                        <rating-component></rating-component>
                    </div>
                    <div class="row mt-3 px-4">
                        <textarea name="text" class="input-group border rounded-1" rows="8" style="resize: none;" required></textarea>
                    </div>
                    <div class="row mt-5 px-4">
                        <button class="btn btn-primary d-flex h-55px">
                            <p class="m-auto">Оставить отзыв</p>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        var on=false;
        function toggle_review()
        {
            if(!on)
                $('#review_form').removeClass('d-none');
            else
                $('#review_form').addClass('d-none');
            on=!on;
        }
    </script>
@endsection
