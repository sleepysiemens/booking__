@extends('Layouts.admin')

@section('reviews')
    active
@endsection

@section('content')
    <h1 class="page-header">Отзывы <small></small></h1>
    <div class="row mb-3">
        <!-- BEGIN col-6 -->
        <div class="col-12 ui-sortable">
            <!-- BEGIN panel -->
            <div class="panel panel-inverse" data-sortable-id="form-stuff-11">
                <!-- BEGIN panel-heading -->
                <div class="panel-heading ui-sortable-handle">
                    <h4 class="panel-title">Отзыв</h4>

                </div>
                <!-- END panel-heading -->
                <!-- BEGIN panel-body -->
                <div class="panel-body">
                    <form action="{{route('admin.reviews.update', $review->id)}}" method="POST">
                        @method('patch')
                        @csrf
                        <fieldset>
                            <legend class="mb-3">Отзыв</legend>
                            <div class="mb-3 d-flex">
                                <label class="form-label my-auto" for="is_published">Публикация</label>
                                <input  class="ms-2" type="checkbox" id="is_published" name="is_published" value="1" @if($review->is_published) checked @endif>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="name">Имя</label>
                                <input class="form-control" type="text" id="name" name="name" value="{{$review->name}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="surname">Фамилия</label>
                                <input class="form-control" type="text" id="surname" name="surname" value="{{$review->surname}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="rating">Оценка</label>
                                <input class="form-control" type="number" id="rating" name="rating" value="{{$review->rating}}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="rating">Текст</label>
                                <textarea class="form-control" name="text">{{$review->text}}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary w-100px me-5px">Сохранить</button>
                            <a href="{{route('admin.reviews.index')}}" class="btn btn-default w-100px">Отмена</a>
                        </fieldset>
                    </form>
                </div>
                <!-- END panel-body -->
            </div>
            <!-- END panel -->
        </div>
        <!-- END col-6 -->
    </div>
@endsection
