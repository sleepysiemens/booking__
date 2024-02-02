@extends('Layouts.admin')

@section('blog')
    active
@endsection

@section('content')
    <h1 class="page-header">Новый пост <small></small></h1>
    <form class="container" id="app" method="post" action="{{route('admin.blog.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="card shadow border-0 rounded-3">
                <div class="card-body p-4">
                    <div class="row">
                        <div class="col-auto pe-0">
                            <select name="category" class="btn btn-light border-0 d-flex text-black">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-auto d-flex">
                            <p class="text-black-200 fs-12px m-auto">{{date("d M")}}</p>
                        </div>
                    </div>

                    <div class="row px-2 my-3">
                        <input type="text" name="title" class="col-12 input-append fw-500 fs-32px btn btn-light text-black text-start" required>
                    </div>

                    <div class="row px-2">
                        <image-input-component></image-input-component>
                    </div>

                    <div class="row px-2 mt-4">
                        <textarea class="col-12 input-append btn btn-light text-black text-start" rows="10" name="text" required></textarea>
                    </div>

                    <div class="row my-3">
                        <div class="col">
                            <div class="p-0 bg-black h-40px m-auto opacity-20 m-auto" style="height: 1px !important"></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-auto">
                            <button class="btn btn-primary h-35px d-flex px-5">
                                <p class="m-auto">Сохранить</p>
                            </button>
                        </div>
                        <div class="col-auto">
                            <a href="{{route('admin.blog.index')}}" class="btn btn-light h-35px d-flex px-5 text-black">
                                <p class="m-auto">Отмена</p>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <script>
            const preview_img = null;
        </script>
    </form>
@endsection
