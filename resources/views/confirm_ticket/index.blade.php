@extends('Layouts.wrapper')

@section('content')
    @include('blocks.welcome')
    <div class="section bg-light p-3">
        <div class="container">
            <p class="opacity-70 text-black text-decoration-underline"><a class="text-black" href="{{route('main.index')}}">{{__('Главная')}}</a> / <a class="text-black" href="{{route('pnrcheck.index')}}">{{__('Проверка бронирования')}}</a></p>
        </div>
    </div>

    <div class="section bg-light pt-4">
        <div class="container pb-5">
            <div class="display-6 fw-bolder mb-3 d-flex align-items-center justify-content-center">
                {{__('Проверка бронирования')}}
            </div>
            <div class="row mt-4 justify-content-center">
                <div class=" col">
                    <div class="card shadow border-0">
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-12 col-lg-6 d-flex pb-3">
                                    <div class="rounded-circle overflow-hidden bg-light w-45px h-45px my-auto d-flex">
                                        <i class="fas fa-key m-auto text-black-100 fs-18px" aria-hidden="true"></i>
                                    </div>
                                    <div class="ms-3 my-auto">
                                        <h4 class="m-0">{{__('Код PNR')}}</h4>
                                    </div>
                                </div>
                            </div>

                            <form class="row px-3 mt-2" method="post" action="{{route('pnrcheck.check')}}">
                                @csrf
                                <div class="col-lg-4 col-12 mb-3">
                                    <fieldset style="all: revert;" class="border border-1 rounded">
                                        <legend style="all: revert;" class="text-black-200 px-2">{{__('Код бронирования (PNR)')}}</legend>
                                        <input type="text" name="pnr" class="w-100" value="@if(isset($pnr)) {{$pnr}} @endif">
                                    </fieldset>
                                </div>
                                <div class="col-lg-4 col-12 mb-3">
                                    <fieldset style="all: revert;" class="border border-1 rounded">
                                        <legend style="all: revert;" class="text-black-200 px-2">{{__('Фамилия пассажира')}}</legend>
                                        <input type="text" name="surname" class="w-100" value="@if(auth()->user()!=null) {{ auth()->user()->surname }}@endif">
                                    </fieldset>
                                </div>
                                <div class="col-lg-4 col-12 mb-3 mt-2 d-flex">
                                    <button class="btn btn-primary w-100">
                                        {{__('Проверить')}}
                                    </button>
                                </div>
                            </form>

                            @if(isset($check))
                                    @if($check)
                                    <div class="row mt-2 px-4">
                                        <div class="card bg-green-100 border-5" style="border-color: rgba(10,255,0,.2)">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-12 d-flex justify-content-start text-green-300">
                                                        <i class="fas fa-check fs-26px"></i>
                                                        <h5 class="my-auto ms-2">{{__('Подтверждено')}}</h5>
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="card border-2 opacity-75">
                                                        <div class="card-body">

                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="row mt-3">
                                                                        <p class="fw-600"><i class="fas fa-plane me-2"></i>{{__('Информация о перелете:')}}</p>
                                                                    </div>
                                                                    <div class="row px-2">
                                                                        <div class="d-flex">
                                                                            <p class="m-0 mt-1 fw-500">{{__('Авиакомпания:')}}</p>
                                                                            <p class="m-0 mt-1 ms-1">{{$data->airline}}</p>
                                                                        </div>
                                                                        <div class="d-flex">
                                                                            <p class="m-0 mt-1 fw-500">{{__('Рейс:')}}</p>
                                                                            <p class="m-0 mt-1 ms-1">{{$data->flight_num}}</p>
                                                                        </div>
                                                                        <div class="d-flex">
                                                                            <p class="m-0 mt-1 fw-500">{{__('Дата вылета:')}}</p>
                                                                            <p class="m-0 mt-1 ms-1">{{date("d M Y", $order->depart_datetime)}}</p>
                                                                        </div>
                                                                        <div class="d-flex">
                                                                            <p class="m-0 mt-1 fw-500">{{__('Дата прибытия:')}}</p>
                                                                            <p class="m-0 mt-1 ms-1">{{date("d M Y", $order->arrival_datetime)}}</p>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="row border-top mt-3 border-3">
                                                                <div class="col-12">
                                                                    <div class="row mt-3">
                                                                        <p class="fw-600"><i class="fas fa-male me-2"></i> {{__('Пассажиры:')}}</p>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="d-flex">
                                                                            <p class="m-0 mt-1 fw-500">{{__('Всего количество:')}}</p>
                                                                            @php $passengers_amount=explode(' ', $data->passengers_amount) @endphp
                                                                            <p class="m-0 mt-1 ms-1">{{$passengers_amount[0]}}</p>
                                                                        </div>
                                                                    </div>

                                                                    @php
                                                                        $passengers_cnt=0;
                                                                        $passengers_max=explode(' ',$data->passengers_amount);
                                                                    @endphp
                                                                    @foreach($data->user_data->user as $user)
                                                                        @php $passengers_cnt++; @endphp
                                                                        <div class="row">
                                                                            <p class="fw-500 mb-2">{{$passengers_cnt}} passenger - {{__($user->type.'_')}} / {{$passengers_cnt}} пассажир - {{$user->type}}</p>
                                                                        </div>
                                                                        <div class="row pb-2 @if($passengers_cnt!=$passengers_max[0]) mb-2 border-bottom @endif">
                                                                            <div class="col-4">
                                                                                <p class="fw-500 mb-2">Passenger / Пассажир</p>
                                                                                <p class="fw-400 mb-0">{{$user->surname}} {{$user->name}}</p>
                                                                            </div>
                                                                            <div class="col-4">
                                                                                <p class="fw-500 mb-2">Birthday / Дата рождения</p>
                                                                                <p class="fw-400 mb-0">{{$user->date_of_birth}}</p>
                                                                            </div>
                                                                            <div class="col-4">
                                                                                <p class="fw-500 mb-2">Document / Документ</p>
                                                                                <p class="fw-400 mb-0">{{$user->serial_number}}</p>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach

                                                                </div>
                                                            </div>

                                                            <div class="row border-top mt-3 border-3">
                                                                <div class="col-12 mt-3">
                                                                    <div class="row">
                                                                        <p class="fw-600"><i class="fas fa-phone me-2"></i>{{__('Контактная информация:')}}</p>
                                                                    </div>
                                                                    <div class="row">
                                                                        @if($data->user_data->phone!=null)
                                                                            <div class="col d-flex">
                                                                                <p class="m-0 mt-1 fw-500">{{__('Телефон:')}}</p>
                                                                                <p class="m-0 mt-1 ms-1">{{$data->user_data->phone}}</p>
                                                                            </div>
                                                                        @endif
                                                                            <div class="col d-flex">
                                                                                <p class="m-0 mt-1 fw-500">Email:</p>
                                                                                <p class="m-0 mt-1 ms-1">{{$data->user_data->email}}</p>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @else
                                    <div class="row mt-2 px-4">
                                        <div class="card bg-red-100 border-5" style="border-color: rgba(255,0,0,.2)">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-12 d-flex justify-content-start text-red-300">
                                                        <i class="fas fa-ban fs-26px"></i>
                                                        <h5 class="my-auto ms-2">{{__('Бронирование не найдено')}}</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                            @endif
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
