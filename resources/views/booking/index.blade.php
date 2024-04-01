@extends('Layouts.wrapper')

@section('content')
    <!-- BEGIN section -->
    @include('blocks.welcome')
    <!-- END section -->
    <div class="bg-light pt-5">
        <div class="container">
            <a href="{{url()->previous()}}"><i class="fas fa-arrow-left"></i> {{__('Назад')}}</a>
        </div>
    </div>
    <form class="section bg-light pt-4" method="post" action="{{route('pay.post.index')}}" id="booking">
        @csrf
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-12">
                    @if($cookie->transfers_amount==0)
                        <div class="card border-0 shadow mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-lg-6 d-flex pb-3">
                                        <div class="rounded-circle overflow-hidden bg-light w-45px h-45px my-auto d-flex">
                                            <i class="fas fa-plane-departure m-auto text-black-100 fs-18px"></i>
                                        </div>
                                        <div class="ms-3">
                                            <h4 class="m-0">{{$cookie->origin}} - {{$cookie->destination}}</h4>
                                            <p class="text-warning m-0">{{__('прямой')}}</p>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="d-flex justify-content-start justify-content-lg-end">
                                            @foreach($cookie->transfers as $transfers)
                                                <img class="h-25px m-0" src="https://pics.avs.io/200/50/{{$transfers->airline_short}}.png" alt="avia">
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div style="" id="details-long-1">
                                    <div class="row row-cols-lg-4 mt-3">
                                        <div class="col">
                                            <div class="container">
                                                <p class="text-dark mb-0">{{date("d M D", $cookie->depart_datetime)}}</p>
                                                <h2 class="fw-400 my-1 ff-montserrat">{{date("H:i", $cookie->depart_datetime)}}</h2>
                                                @php $origin__=$airports->where('airport_code', '=', $cookie->origin)->first(); @endphp
                                                <p class="text-dark fw-300 mt-0">{{$cookie->origin}} ({{$origin__['city_name']}})</p>
                                            </div>
                                        </div>
                                        <div class="col d-flex opacity-25">
                                            <div class="bg-black w-100 my-auto position-relative" style="height: 2px">
                                            </div>
                                            <i class="fas fa-caret-right my-auto" aria-hidden="true"></i>
                                        </div>
                                        <div class="col">
                                            <div class="container">
                                                <p class="text-dark mb-0">{{date("d M D", $cookie->arrival_datetime)}}</p>
                                                <h2 class="fw-400 my-1 ff-montserrat">{{date("H:i", $cookie->arrival_datetime)}}</h2>
                                                @php $destination__=$airports->where('airport_code', '=', $cookie->destination)->first(); @endphp
                                                <p class="text-dark fw-300 mt-0 fs-12px">{{$cookie->destination}} ({{$destination__['city_name']}})</p>
                                            </div>
                                        </div>
                                        <div class="col d-none d-lg-block">
                                            <div class="container">
                                                @php
                                                    $duration=explode('H',$cookie->duration);
                                                @endphp
                                                <p class="fw-500 mb-0">
                                                    {{(int) filter_var($duration[0], FILTER_SANITIZE_NUMBER_INT)}} {{__('ч')}} {{(int) filter_var($duration[1], FILTER_SANITIZE_NUMBER_INT)}} {{__('мин')}}
                                                </p>
                                                <p class="fw-400 fs-12px text-green mb-0">{{__('прямой')}}</p>
                                                <p class="fw-400 fs-12px text-black-200">{{$cookie->flight_num}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="card border-0 shadow mb-3">
                            <div class="row mt-3">
                                <div class="col-12">
                                    <div class="d-flex justify-content-start justify-content-lg-end px-3">
                                        @foreach($cookie->transfers as $transfers)
                                            @if(!isset($airlines_) or $airlines_!=$transfers->airline_short)
                                                <img class="h-25px m-0 ms-1" src="https://pics.avs.io/200/50/{{$transfers->airline_short}}.png" alt="avia">
                                            @endif
                                            @php $airlines_=$transfers->airline_short @endphp
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @foreach($cookie->transfers as $transfer)

                                    @if(isset($last_arrival))
                                        <div class="container">
                                            <div class="card bg-light border-light">
                                                <div class="card-body row text-black-200 py-2">
                                                    <div class="col d-flex">
                                                        <i class="far fa-clock my-auto"></i>
                                                        <p class="m-0 my-auto ms-2">{{__('Пересадка')}}</p>
                                                    </div>
                                                    <div class="col d-flex justify-content-end">
                                                        @php
                                                            $date1 = Carbon\Carbon::parse(date("Y-m-d H:i:s",$transfer->depart_datetime));
                                                            $date2 = Carbon\Carbon::parse(date("Y-m-d H:i:s",$last_arrival));
                                                            $diff = $date1->diff($date2);
                                                        @endphp
                                                        <p class="m-0 my-auto">{{$diff->h}} {{__('ч')}} {{$diff->i}} {{__('мин')}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="row row-cols-lg-4 mt-3" >
                                        <div class="col">
                                            <div class="container">
                                                <p class="text-dark mb-0">{{date("Y.m.d", $transfer->depart_datetime)}}</p>
                                                <h2 class="fw-400 my-1 ff-montserrat">{{date("H:i", $transfer->depart_datetime)}}</h2>
                                                @php $origin__=$airports->where('airport_code', '=', $transfer->origin)->first(); @endphp
                                                <p class="text-dark fw-300 mt-0">{{$origin__['city_name']}} ({{$transfer->origin}})</p>
                                            </div>
                                        </div>
                                        <div class="col d-flex opacity-25">
                                            <div class="bg-black w-100 my-auto position-relative" style="height: 2px">
                                            </div>
                                            <i class="fas fa-caret-right my-auto"></i>
                                        </div>
                                        <div class="col">
                                            <div class="container">
                                                <p class="text-dark mb-0">{{date("Y.m.d", $transfer->arrival_datetime)}}</p>
                                                <h2 class="fw-400 my-1 ff-montserrat">{{date("H:i", $transfer->arrival_datetime)}}</h2>
                                                @php $destination__=$airports->where('airport_code', '=', $transfer->destination)->first(); @endphp

                                                <p class="text-dark fw-300 mt-0">{{$destination__['city_name']}} ({{$transfer->destination}})</p>
                                            </div>
                                        </div>
                                        <div class="col d-none d-lg-block">
                                            <div class="container">
                                                @php
                                                    $duration=explode('H',$transfer->duration);
                                                @endphp
                                                <p class="fw-500 mb-0">
                                                    {{(int) filter_var($duration[0], FILTER_SANITIZE_NUMBER_INT)}} {{__('ч')}} {{(int) filter_var($duration[1], FILTER_SANITIZE_NUMBER_INT)}} {{__('мин')}}
                                                </p>
                                                <p class="fw-400 fs-12px text-green mb-0">{{__('прямой')}}</p>
                                                <p class="fw-400 fs-12px text-black-200">{{__('Рейс')}} {{$transfer->flight_num}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @php $last_arrival=$transfer->arrival_datetime @endphp
                                @endforeach
                            </div>
                        </div>
                    @endif

                        @if(auth()->user()==null)
                            <div class="card border-0 shadow mb-3">
                                <div class="card-body">
                                    <h4 class="m-0">{{__('Авторизуйтесь')}}</h4>
                                    <p class="opacity-50 mt-2">{{__('Вход в личный кабинет')}}</p>
                                    <div class="row pb-2">
                                        <div class="col-6">
                                            <a href="{{route('login')}}" class="btn btn-primary d-flex fw-bold header-link h-55px" {{---target="_blank"--}}>
                                                <p class="text-center m-auto">{{__('Войти')}}</p>
                                            </a>
                                        </div>
                                        <div class="col-6">
                                            <a href="https://t.me/trip_avia_1_bot?start=start" class="btn btn-primary d-flex fw-bold header-link h-55px" target="_blank" style="background-color: #2AABEE; border-color: #2AABEE">
                                                <p class="text-center m-auto">{{__('Войти через Telegram')}} <i class="fab fa-telegram-plane"></i></p>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row px-5 py-2">
                                        <hr class="col my-auto">
                                        <p class="col-1 my-auto text-center p-0">или</p>
                                        <hr class="col my-auto">
                                    </div>
                                    <div class="row mt-1">
                                        <div class="col">
                                            <a href="{{route('register')}}" class="btn btn-primary d-flex fw-bold header-link h-55px" {{---target="_blank"--}}>
                                                <p class="text-center m-auto">{{__('Зарегистрироваться')}}</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="card border-0 shadow mb-3">
                            <div class="card-body">
                                <h4 class="m-0">{{__('Контактные данные')}}</h4>
                                <p class="opacity-50 mt-2">{{__('На почту мы отправим документ “Подтверждение бронирования”')}}</p>
                                @if(session('error')!=null)
                                <div class="bg-red-200 rounded-pill">
                                    <p class="opacity-50 mt-2 p-1 px-4">{{__('Email уже используется. Войдите, чтобы забронировать билет')}}</p>
                                </div>
                                @endif
                                <div class="row pb-2">
                                    <div class="col-lg-6 col-12 mb-3 mb-lg-0">
                                        <fieldset style="all: revert;" class="border border-1 rounded">
                                            <legend style="all: revert;" class="text-black-200 px-2">Email</legend>
                                            <input type="email" name="email" class="w-100" @if(auth()->user()!=null and auth()->user()->email!=null) value="{{auth()->user()->email}}" @endif {{--@if(auth()->user()!=null and auth()->user()->email!=null) readonly @endif--}} required>
                                        </fieldset>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <fieldset style="all: revert;" class="border border-1 rounded">
                                            <legend style="all: revert;" class="text-black-200 px-2">{{__('Телефон')}}</legend>
                                            <input type="tel" name="phone" class="w-100" @if(auth()->user()!=null and auth()->user()->phone!=null) value="{{auth()->user()->phone}}" @endif>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>


                    <div class="card border-0 shadow mb-3">
                        @php $passengers_cnt=0; @endphp
                        @foreach($adults as $adult)
                            @php $passengers_cnt++; @endphp
                            @if($passengers_cnt!=1)
                                <div class="col-1 p-0 bg-black m-auto opacity-20 d-none d-lg-block" style="height: 1px; width: 95%"></div>
                            @endif
                            @include('blocks.booking.adult')
                        @endforeach

                        @foreach($children as $child)
                            @php $passengers_cnt++; @endphp
                            @if($passengers_cnt!=1)
                                <div class="col-1 p-0 bg-black m-auto opacity-20 d-none d-lg-block" style="height: 1px; width: 95%"></div>
                            @endif
                            @include('blocks.booking.child')
                        @endforeach

                        @foreach($infants as $infant)
                            @php $passengers_cnt++; @endphp
                            @if($passengers_cnt!=1)
                                <div class="col-1 p-0 bg-black m-auto opacity-20 d-none d-lg-block" style="height: 1px; width: 95%"></div>
                            @endif
                            @include('blocks.booking.infant')
                        @endforeach


                    </div>

                    <div class="card border-0 shadow mb-3">
                        <div class="card-body">
                            <div class="row pb-3">
                                <h4 class="my-auto">{{__('Комментарий к заказу')}}</h4>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <fieldset style="all: revert;" class="border border-1 rounded ">
                                        <legend style="all: revert;" class="text-black-200 px-2">{{__('Комментарий к заказу')}}</legend>
                                        <textarea name="comment" class="w-100 h-100px" {{--@if(auth()->user()==null) disabled @endif--}}></textarea>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-12">

                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <price-check-component
                                adults_amount="{{$cookie->passengers->adults}}"
                                children_amount="{{$cookie->passengers->children}}"
                                infants_amount="{{$cookie->passengers->infants}}"
                                passengers_amount="{{$cookie->passengers_amount}}"
                                total_rub="{{$cookie->booking_price_rub}}"
                                total_eur="{{$cookie->booking_price_eur}}"
                            >
                            </price-check-component>
                            <div class="bg-black opacity-10 d-block w-100 mb-3" style="height: 1px;"></div>
                            <livewire:BookingTotal :cookie="$cookie"/>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </form>
@endsection

@section('scripts')
    <script>
        $('body').on('input', '.input-words', function(){
            this.value = this.value.replace(/[^a-z\s]/gi, '');
        });

        $('body').on('input', '.input-number', function(){
            this.value = this.value.replace(/[^0-9]/g, '');
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // При загрузке страницы пытаемся восстановить значения из localStorage для всех инпутов
            var inputs = document.querySelectorAll('input');
            inputs.forEach(function(input, index) {
                var savedValue = localStorage.getItem('inputFieldValue_' + index);
                if (savedValue) {
                    input.value = savedValue;
                }
                // Слушаем событие изменения в каждом поле ввода и сохраняем значение в localStorage
                input.addEventListener('input', function() {
                    localStorage.setItem('inputFieldValue_' + index, input.value);
                });
            });

            // Если вы хотите очистить значения из localStorage при отправке формы, используйте:
             document.getElementById('myForm').addEventListener('submit', function() {
                 inputs.forEach(function(input, index) {
                     localStorage.removeItem('inputFieldValue_' + index);
                 });
             });
        });
    </script>

    <script>
        $('body').on('click', '#submit', function(){
            console.log('click');

            $('input[required]').each(function ()
            {
                if(!$( this ).val())
                {
                    $( this ).closest('fieldset').addClass('border-red')
                    $( this ).closest('fieldset').addClass('bg-red-100')
                }
            })

        });


    </script>
@endsection
