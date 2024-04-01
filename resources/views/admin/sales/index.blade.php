@extends('Layouts.admin')

@section('sales')
    active
@endsection

@section('content')
    <h1 class="page-header">Промокоды <small></small></h1>
    <div class="row">
        <a href="{{route('admin.promocodes.create')}}" class="btn btn-primary h-35px d-flex col-auto px-5">
            <p class="m-auto"> Новый промокод </p>
        </a>
    </div>
        <div class="row mt-4">
            <div class="col-lg-6 col-12">
                <div class="panel panel-inverse" data-sortable-id="table-basic-2" data-init="true">
                    <!-- BEGIN panel-heading -->
                    <div class="panel-heading ui-sortable-handle">
                        <h4 class="panel-title">Промокоды</h4>
                    </div>

                    <!-- END panel-heading -->
                    <!-- BEGIN panel-body -->
                    <div class="panel-body">
                        <!-- BEGIN table-responsive -->
                        <div class="table-responsive">
                            <table class="table table-hover mb-0 text-dark">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Промокод</th>
                                    <th>Скидка</th>
                                    <th>Активен</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($promocodes as $promocode)
                                    <tr>
                                        <td>
                                            <div class="d-flex">
                                                <p class="my-auto">
                                                    {{$promocode->id}}
                                                </p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <p class="my-auto">
                                                    {{$promocode->title}}
                                                </p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex h-100">
                                                <p class="my-auto">
                                                    {{$promocode->percent}}%
                                                </p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex h-100">
                                                <p class="my-auto">
                                                    {{$promocode->is_available}}
                                                </p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- END table-responsive -->
                    </div>
                    <!-- END panel-body -->
                </div>

            </div>

        </div>
@endsection
