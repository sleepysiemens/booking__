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
                        <div class="col text-center">Дата создания</div>
                        <div class="col text-center">Пользователь</div>
                        <div class="col text-center">Направление</div>
                        <div class="col text-center">Стоимость</div>
                        <div class="col text-center">Билет</div>
                        <div class="col text-center">Оплачено</div>
                        <div class="col text-center">Подтверждено</div>
                        <div class="col text-center"></div>
                    </div>
                    @php
                        $i=0;
                    @endphp
                    @foreach($orders as $order)
                        @php
                            $i++;
                            $data=json_decode($order->data);
                        @endphp
                        <div class="row py-3 @if($i%2==0) table-row @endif">
                            <div class="col text-center">{{$order->id}}</div>
                            <div class="col text-center">{{$order->created_at}}</div>
                            <div class="col text-center">{{$order->email}}</div>
                            <div class="col text-center">{{$data->origin_city}}({{$data->origin}}) - {{$data->destination_city}}({{$order->destination}})</div>
                            <div class="col text-center">{{$order->price}}</div>
                            <div class="col text-center"><a target="_blank" href="{{route('ticket.index', $order->id)}}">открыть</a></div>
                            <div class="col text-center">@if($order->is_payed)<i class="fas fa-check"></i>@else<i class="fas fa-times"></i>@endif</div>
                            <div class="col text-center">@if($order->is_confirmed)<i class="fas fa-check"></i>@else<i class="fas fa-times"></i>@endif</div>
                            <div class="col text-center"><a href="{{route('admin.orders.edit',$order->id)}}"><i class="far fa-edit fs-20px"></i></a></div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- END table-responsive -->
        </div>
        <!-- END panel-body -->
    </div>
@endsection
