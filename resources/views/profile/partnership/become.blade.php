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
                                <img class="w-75 m-auto" src="{{asset('img/qr-code/qrcode.png')}}" alt="QR Code">
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
                        <form class="col" method="post" action="{{route('partnership.form')}}">
                            @csrf
                            <div class="card border-0 shadow">
                                <div class="card-body">
                                    <h4 class="fw-500 mb-3">{{__('Данные о партнере')}}</h4>
                                    <div class="row">
                                        <div class="col-12 mb-3">
                                            <fieldset style="all: revert;" class="border border-1 rounded">
                                                <legend style="all: revert;" class="text-black-200 px-2">{{__('Ссылка на ресурс')}}</legend>
                                                <input type="text" name="link" class="w-100" required>
                                            </fieldset>
                                        </div>

                                        <div class="col-12 mb-3">
                                            <fieldset style="all: revert;" class="border border-1 rounded">
                                                <legend style="all: revert;" class="text-black-200 px-2">{{__('Комментарий к заказу')}}</legend>
                                                <textarea name="comment" class="w-100 h-100px" @if(auth()->user()==null) disabled @endif></textarea>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="container ms-0 col-lg-5 col-12">
                                    <button class="btn btn-primary d-flex h-50px w-100">
                                        <p class="m-auto">{{__('Сохранить')}}</p>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                {{----}}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
