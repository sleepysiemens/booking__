@extends('Layouts.admin')

@section('orders')
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
                    <h4 class="panel-title">Заказ</h4>

                </div>
                <!-- END panel-heading -->
                <!-- BEGIN panel-body -->
                <div class="panel-body">
                    <form action="{{route('admin.orders.update', $order->id)}}" method="POST">
                        @method('patch')
                        @csrf
                        <fieldset>
                            <legend class="mb-3">Заказ #{{$order->id}}</legend>

                            <div class="mb-3">
                                <label class="form-label" for="price">Цена</label>
                                <input class="form-control" type="number" id="price" name="price" value="{{$order->price}}">
                            </div>

                            <div class="mb-3 d-flex">
                                <label class="form-label my-auto" for="is_published">Оплачено</label>
                                <input  class="ms-2" type="checkbox" id="is_published" name="is_payed" value="1" @if($order->is_payed) checked @endif>
                            </div>

                            <div class="mb-3 d-flex">
                                <label class="form-label my-auto" for="is_confirmed">Подтверждено</label>
                                <input  class="ms-2" type="checkbox" id="is_confirmed" name="is_confirmed" value="1" @if($order->is_confirmed) checked @endif>
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
