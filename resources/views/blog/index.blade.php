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
                <a class="text-black" href="{{route('blog.index', 1)}}">Блог</a>
            </p>
        </div>
    </div>

    <div class="section bg-light pt-4">
        <div class="container">
            <div class="display-6 fw-bolder mb-3 d-flex align-items-center justify-content-center">
                Блог о путешествиях
            </div>
            <div class="row">
                <div class="col-auto pe-0 mb-2">
                    <button class="btn d-flex btn-primary rounded-5 h-40px"><p class="m-auto px-2">Все</p></button>
                </div>
                @foreach($categories as $category)
                    <div class="col-auto pe-0 mb-2">
                        <button class="btn d-flex btn-white rounded-5 h-40px"><p class="m-auto px-2">{{$category->name}}</p></button>
                    </div>
                @endforeach
            </div>

            <div class="row">
                @foreach($posts as $post)
                    <div class="col-12 col-lg-4 mt-4">
                        <a href="{{asset(route('blog.show', $post->id))}}" class="card shadow border-0 overflow-hidden cursor-pointer">
                            <div class="card-header w-100 h-200px overflow-hidden p-0">
                                <img class="w-100 h-100 object-fit-cover" src="{{asset('img/blog/'.$post->image)}}" alt="img">
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-auto">
                                        <span class="btn btn-light border-0 d-flex">
                                            <p class="m-auto text-black fw-300 opacity-50 fs-12px">{{$categories[($post->category)-1]->name}}</p>
                                        </span>
                                    </div>
                                    <div class="row mt-3">
                                        <h6>{{$post->title}}</h6>
                                    </div>
                                    <div class="row">
                                        <p class="opacity-80">
                                            {{$post->text}}
                                        </p>
                                    </div>
                                    <div class="row mt-3">
                                        <p class="text-black-200 fs-12px m-0">{{ date("d M",strtotime($post->created_at)) }}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

            <div class="row mt-4 justify-content-center">
                @for($i=1; $i<=$page_cnt; $i++)
                    <div class="col-auto pe-0">
                        <a href="{{route('blog.index', $i)}}" class="btn @if($i==$page) btn-black @else btn-white @endif d-flex">
                            <p class="m-auto">{{$i}}</p>
                        </a>
                    </div>
                @endfor

            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
