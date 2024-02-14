@extends('Layouts.wrapper')

@section('content')
    @include('blocks.welcome')
    <div class="section bg-light p-3">
        <br>
    </div>

    <div class="section bg-light pt-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card shadow border-0">
                        <div class="card-body">
                            <div class="row justify-content-center mt-2">
                                <div class="col-auto">
                                    <h1 class="text-center mb-3">{{__('Ожидание билета')}}</h1>
                                    <p class="text-center">{{_('Поздравляем! Вы забронировали билет.')}}</p>
                                </div>
                            </div>

                            <livewire:wait lazy/>

                            <div class="mt-5">
                                <h4 class="text-center m-0 text-primary opacity-70">{{__('Обычно это занимает до 10 минут.')}}</h4>
                                <loading-component
                                    bg_light="{{asset('img/loading/bg-light.svg')}}"
                                    bg_dark="{{asset('img/loading/bg-dark.svg')}}"
                                    building="{{asset('img/loading/building.svg')}}"
                                    plane="{{asset('img/loading/plane.svg')}}"
                                ></loading-component>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
