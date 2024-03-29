@extends('Layouts.wrapper')

@section('content')
    @include('blocks.welcome')
    <div class="section bg-light p-3">
        <div class="container">
            <p class="opacity-70 text-black text-decoration-underline">
                <a class="text-black" href="{{route('main.index')}}">{{__('Главная')}}</a>
                /
                <a class="text-black" href="{{route('blog.index',1)}}">{{__('Отзывы')}}</a>
            </p>
        </div>
    </div>

    <div class="section bg-light pt-4">
        <div class="container">
            <div class="row">
                <h1 class="col-lg-9 col-6">{{__('Отзывы')}}</h1>
                <div class="col-lg-3 col-6">
                    <a class="btn btn-primary d-flex justify-content-center py-3" onclick="toggle_review()">
                        <i class="fas fa-plus my-auto me-2"></i>
                        <p class="my-auto ">{{__('Оставить отзыв')}}</p>
                    </a>
                </div>
            </div>

            <div class="row">
                @foreach($reviews as $review)
                    <div class="col-12 col-lg-4 mt-4">
                        <div class="card shadow border-0 overflow-hidden cursor-pointer h-100">
                            <div class="card-body position-relative">
                                <div class="row py-2 mt-1 justify-content-between">
                                    <h6 class="col my-auto fs-20px">{{$review->name}} {{$review->surname}}</h6>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-auto">
                                        <span class="btn bg-teal-200 text-teal-800 border-0 d-flex justify-content-center p-2">
                                            <i class="fas fa-star text-teal-400 my-auto opacity-75 me-2 fs-12px"></i>
                                            <p class="my-auto fw-600 fs-12px">{{$review->rating}}.0</p>
                                        </span>
                                    </div>
                                    {{--<div class="col-auto">
                                        <span class="btn btn-light border-0 d-flex justify-content-center">
                                            <i class="fas fa-check my-auto text-black opacity-50 me-1 fs-12px"></i>
                                            <p class="my-auto text-black fw-300 opacity-50 fs-12px">Есть ответ</p>
                                        </span>
                                    </div>--}}
                                </div>
                                <div class="row mt-3 mb-3">
                                    <p class="opacity-80">
                                        {{$review->text}}
                                    </p>
                                </div>
                                <div class="row mt-3 position-absolute bottom-0">
                                    <p class="text-black-200 fs-12px">{{date("d.m.Y H:i",strtotime($review->created_at))}}</p>
                                </div>
                            </div>
                        </div>
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
                        <h1 class="fs-22px text-center">{{__('Оставить отзыв')}}</h1>
                    </div>
                    <div class="row mt-3 px-4">
                        <input class="input-group border h-35px rounded-1" placeholder="{{__('Имя')}}" name="name" required>
                    </div>
                    <div class="row mt-3 px-4">
                        <input class="input-group border h-35px rounded-1" placeholder="{{__('Фамилия')}}" name="surname" required>
                    </div>
                    <div class="row mt-3 px-4">
                        <rating-component></rating-component>
                    </div>
                    <div class="row mt-3 px-4">
                        <textarea name="text" class="input-group border rounded-1" rows="8" style="resize: none;" required></textarea>
                    </div>
                    <div class="row mt-5 px-4">
                        <button class="btn btn-primary d-flex h-55px">
                            <p class="m-auto">{{__('Оставить отзыв')}}</p>
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
