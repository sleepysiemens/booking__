@extends('Layouts.admin')

@section('partners')
    active
@endsection

@section('content')
    <h1 class="page-header">Партнеры <small></small></h1>

        <div class="row">
            <div class="col-lg-6 col-12">
                <div class="panel panel-inverse" data-sortable-id="table-basic-2" data-init="true">
                    <!-- BEGIN panel-heading -->
                    <div class="panel-heading ui-sortable-handle">
                        <h4 class="panel-title">Заявки на регистрацию</h4>
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
                                    <th>Пользователь</th>
                                    <th>Ссылка</th>
                                    <th>Комментарий</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($applications as $application)
                                    <tr>
                                        <td>
                                            <div class="d-flex">
                                                <p class="my-auto">
                                                    {{$application->id}}
                                                </p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <p class="my-auto">
                                                    {{$application->email}}
                                                </p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex h-100">
                                                <p class="my-auto">
                                                    {{$application->link}}
                                                </p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex h-100">
                                                <p class="my-auto">
                                                    {{$application->comment}}
                                                </p>
                                            </div>
                                        </td>
                                        <td class="d-flex">
                                            <div>
                                                <a href="{{route('admin.partners.accept_application',$application->id)}}" class="btn btn-primary m-auto">
                                                    принять
                                                </a>
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

                <div class="panel panel-inverse" data-sortable-id="table-basic-2" data-init="true">
                    <!-- BEGIN panel-heading -->
                    <div class="panel-heading ui-sortable-handle">
                        <h4 class="panel-title">Заявки на вывод средств</h4>
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
                                    <th>Пользователь</th>
                                    <th>Ссылка на кошелек</th>
                                    <th>Сумма</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($withdraws as $withdraw)
                                    <tr>
                                        <td>
                                            <div class="d-flex">
                                                <p class="my-auto">
                                                    {{$withdraw->id}}
                                                </p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <p class="my-auto">
                                                    {{$withdraw->email}}
                                                </p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <p class="my-auto">
                                                    {{$withdraw->wallet_link}}
                                                </p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex h-100">
                                                <p class="my-auto">
                                                    {{$withdraw->amount}}
                                                </p>
                                            </div>
                                        </td>
                                        <td class="d-flex">
                                            <div>
                                                <a href="{{route('admin.partners.accept_withdraw',$withdraw->id)}}" class="btn btn-primary m-auto">
                                                    готово
                                                </a>
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
            <div class="col-lg-6 col-12">
                <div class="panel panel-inverse" data-sortable-id="table-basic-2" data-init="true">
                    <!-- BEGIN panel-heading -->
                    <div class="panel-heading ui-sortable-handle">
                        <h4 class="panel-title">Партнеры</h4>
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
                                    <th>Пользователь</th>
                                    <th>Баланс</th>
                                    <th>Кол-во пользователей</th>
                                    <th>Кол-во заказов</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($partners as $partner)
                                    <tr>
                                        <td>
                                            <div class="d-flex">
                                                <p class="my-auto">
                                                    {{$partner->id}}
                                                </p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <p class="my-auto">
                                                    {{$partner->email}}
                                                </p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <p class="my-auto">
                                                    {{$partner->balance}}
                                                </p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <p class="my-auto">
                                                    {{$partner->users_count}}
                                                </p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <p class="my-auto">
                                                    {{$partner->orders_count}}
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
