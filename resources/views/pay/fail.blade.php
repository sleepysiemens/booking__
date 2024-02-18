@extends('Layouts.wrapper')

@section('content')
    @include('blocks.welcome')

    <div class="section bg-light">
        <div class="container">
            <div class="card border-0 shadow">
                <div class="card-body px-5">
                    @csrf
                    <div class="row mt-3">
                        <h2 class="text-center">{{__('Оплата заказа')}}</h2>
                    </div>
                    <div class="row mt-3">
                        <p class="text-center">{{__('Не удалось выполнить платеж')}}</p>
                        <a class="text-center" href="{{route('pay.get.index')}}">{{__('Назад')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
