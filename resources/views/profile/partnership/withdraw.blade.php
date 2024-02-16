@extends('Layouts.wrapper')

@section('content')
    @include('blocks.welcome')

    <div class="section bg-light">
        <div class="container">
            <div class="row mb-3">
                <div class="col-lg-3 mb-4">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <p class="py-1 mt-1 text-black-200">{{auth()->user()->email}}</p>
                            <div class="bg-black opacity-20 d-block w-100 mb-3" style="height: 1px;"></div>

                            <a class="btn w-100 d-flex btn-white border-0 mb-2" href="{{route('profile.index')}}">
                                <i class="far fa-user my-auto fs-18px text-primary"></i>
                                <p class="my-auto ms-2 fw-400">{{__('Персональные данные')}}</p>
                            </a>
                            <a class="btn w-100 d-flex btn-white border-0 mb-2" href="{{route('profile.orders')}}">
                                <i class="far fa-check-circle my-auto fs-18px text-primary"></i>
                                <p class="my-auto ms-2 fw-400">{{__('Заказы')}}</p>
                            </a>
                            <a class="btn w-100 d-flex btn-white border-0 mb-2" href="{{route('profile.passengers')}}">
                                <i class="fas fa-list-ul my-auto fs-18px text-primary"></i>
                                <p class="my-auto ms-2 fw-400">{{__('Пассажиры')}}</p>
                            </a>
                            <a class="btn w-100 d-flex btn-white border-0 mb-2 active" href="{{route('partnership.index')}}">
                                <i class="fas fa-wallet my-auto fs-18px text-primary"></i>
                                <p class="my-auto ms-2 fw-400">{{__('Партнерская программа')}}</p>
                            </a>
                            <a class="btn w-100 d-flex btn-white border-0 mb-2" href="{{route('profile.logout')}}">
                                <i class="fas fa-sign-out-alt my-auto fs-18px text-primary"></i>
                                <p class="my-auto ms-2 fw-400">{{__('Выйти')}}</p>
                            </a>
                        </div>
                    </div>

                    <div class="card border-0 shadow mt-4">
                        <div class="card-body">
                            <div class="row">
                                <img class="w-75 m-auto" src="{{ url('/qr-code') }}" alt="QR Code">
                            </div>
                            <div class="row">
                                <a class="m-auto text-center fs-16px fw-500" href="{{route('pnrcheck.index')}}">{{__('Проверка бронирования')}}</a>
                            </div>
                        </div>
                    </div>
                </div>

                {{----}}
                <div class="col-lg-9 col-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="card shadow border-0">
                                <form class="card-body" method="post" action="{{route('partnership.withdraw.send')}}">
                                    @csrf
                                    <div class="row">
                                        <h4 class="fw-500 mb-3 text-center">{{__('Вывод средств')}}</h4>
                                    </div>
                                    <div class="row">
                                        <p class="text-center w-75 mx-auto">
                                            {{__('В данный момент вывсти заработанные средства возможно только в USDT и только в сети TRC20. Среднее время обработки заявки на вывод средств - 24 часа')}}
                                        </p>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-12 row">
                                            <div class="d-flex justify-content-center mb-3">
                                                <p class="fs-14px my-auto me-2">{{__('Баланс')}}: </p>
                                                <h4 class="fw-500 my-auto text-center">{{$partnership->balance}} ₽</h4>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <fieldset style="all: revert;" class="border border-1 rounded">
                                                <legend style="all: revert;" class="text-black-200 px-2">{{__('Ссылка на кошелек')}}</legend>
                                                <input type="text" name="wallet_link" class="w-100" required>
                                            </fieldset>
                                        </div>
                                        <div class="col-lg-6 col-12 mt-3">
                                            <fieldset style="all: revert;" class="border border-1 rounded">
                                                <legend style="all: revert;" class="text-black-200 px-2">{{__('Сумма')}}</legend>
                                                <input type="number" name="amount" class="w-100" max="{{$partnership->balance}}" required>
                                            </fieldset>
                                        </div>
                                        <div class="col-lg-6 col-12 mt-3">
                                            <button class="btn btn-primary h-55px w-100">
                                                {{__('Вывести средства')}}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="row mt-3">
                                <div class="col-12">
                                    <div class="card shadow border-0">
                                        <div class="card-body">
                                            <div class="row">
                                                <h4 class="fw-500 mb-3 text-center">{{__('История операций')}}</h4>
                                            </div>
                                            <div class="row">
                                                <div class="col-3 border-end">
                                                    <h6>#</h6>
                                                </div>
                                                <div class="col-3 border-end">
                                                    <h6>Дата заказа</h6>
                                                </div>
                                                <div class="col-3 border-end">
                                                    <h6>Сумма</h6>
                                                </div>
                                                <div class="col-3">
                                                    <h6>Статус</h6>
                                                </div>
                                            </div>
                                            @foreach($withdraws as $withdraw)
                                                <hr class="m-0">
                                                <div class="row">
                                                    <div class="col-3 border-end">
                                                        <p>{{$withdraw->id}}</p>
                                                    </div>
                                                    <div class="col-3 border-end">
                                                        <p>{{$withdraw->created_at}}</p>
                                                    </div>
                                                    <div class="col-3 border-end">
                                                        <p>{{$withdraw->amount}}</p>
                                                    </div>
                                                    <div class="col-3">
                                                        @if($withdraw->done)<p class="text-green">{{__('Завершен')}}</p>@else<p class="text-warning">{{__('В обработке')}}</p>@endif

                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                {{----}}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
