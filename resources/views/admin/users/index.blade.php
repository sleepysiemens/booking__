@extends('Layouts.admin')

@section('orders')
    active
@endsection

@section('content')
    <div class="panel panel-inverse" data-sortable-id="table-basic-2" style="">
        <!-- BEGIN panel-heading -->
        <div class="panel-heading ui-sortable-handle">
            <h4 class="panel-title">Заявки</h4>

        </div>
        <!-- END panel-heading -->
        <!-- BEGIN panel-body -->
        <div class="panel-body">
            <!-- BEGIN table-responsive -->
            <div class="table-responsive">
                <div class="overflow-hidden rounded-3">
                    <div class="row py-3 fw-700 bg-light-600">
                        <div class="col text-center">#</div>
                        <div class="col text-center">Дата регистрации</div>
                        <div class="col text-center">Email</div>
                        <div class="col text-center">Телефон</div>
                        <div class="col text-center">ФИО</div>
                    </div>
                    @php
                        $i=0;
                    @endphp
                    @foreach($users as $user)
                        @php$i++ @endphp
                        <div class="row py-3 @if($i%2==0) table-row @endif">
                            <div class="col text-center">{{$user->id}}</div>
                            <div class="col text-center">{{$user->created_at}}</div>
                            <div class="col text-center">{{$user->email}}</div>
                            <div class="col text-center">{{$user->phone}}</div>
                            <div class="col text-center">{{$user->name}}</div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- END table-responsive -->
        </div>
        <!-- END panel-body -->
    </div>
@endsection
