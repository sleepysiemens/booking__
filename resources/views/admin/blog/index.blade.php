@extends('Layouts.admin')

@section('blog')
    active
@endsection

@section('content')
    <h1 class="page-header">Посты <small></small></h1>
    <div class="row">
        <a href="{{route('admin.blog.create')}}" class="btn btn-primary h-35px d-flex col-auto px-5">
            <p class="m-auto">
                Новый пост
            </p>
        </a>
    </div>
    <div class="container">
        <div class="row">
            @foreach($posts as $post)
                <div class="col-12 col-lg-4 mt-4">
                    <a href="{{route('admin.blog.edit', $post->id)}}" class="card shadow border-0 overflow-hidden cursor-pointer text-decoration-none">
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
                                <div class="row mt-3 h-40px">
                                    <h6>{{$post->title}}</h6>
                                </div>
                                <div class="row">
                                    <p class="opacity-80 hide-text fs-14px">
                                        {{$post->text}}
                                    </p>
                                </div>
                                <div class="row mt-3">
                                    <p class="text-black-200 fs-12px m-0">{{date("d M", strtotime($post->created_at))}}</p>
                                </div>
                            </div>

                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
