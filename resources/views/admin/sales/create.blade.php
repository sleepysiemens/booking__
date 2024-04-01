@extends('Layouts.admin')

@section('sales')
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
                    <form action="{{route('admin.promocodes.store')}}" method="POST">
                        @csrf
                        <fieldset>
                            <legend class="mb-3">Отзыв</legend>
                            <div class="mb-3 d-flex">
                                <label class="form-label my-auto" for="is_available">Доступен</label>
                                <input  class="ms-2" type="checkbox" id="is_available" name="is_available" value="1" checked>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="title">Промокод</label>
                                <input class="form-control" type="text" id="title" name="title" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="percent">Скидка</label>
                                <input class="form-control" type="text" id="percent" name="percent" required>
                            </div>

                            <button type="submit" class="btn btn-primary w-100px me-5px">Сохранить</button>
                            <a href="{{route('admin.promocodes.index')}}" class="btn btn-default w-100px">Отмена</a>
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
