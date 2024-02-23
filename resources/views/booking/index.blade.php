@extends('Layouts.wrapper')

@section('content')
    <!-- BEGIN section -->
    @include('blocks.welcome')
    <!-- END section -->
    <form class="section bg-light pt-4" method="post" action="{{route('pay.post.index')}}">
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
                                            <div class="rounded-circle overflow-hidden bg-primary w-25px h-25px my-auto">
                                                <img class="w-100 h-100" src="https://static.onetwotrip.com/images/airlines/svg/{{$cookie->transfers[0]->airline_short}}.svg" alt="avia">
                                            </div>
                                            <p class="my-auto ms-2">{{$cookie->airline}}</p>
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
                                                <p class="fw-500 mb-0">{{$cookie->duration}}</p>
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
                            <div class="card-body">
                                @foreach($cookie->transfers as $transfer)

                                    @if($transfer->transfer!='start' and isset($last_arrival))
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
                                                <p class="fw-500 mb-0">{{$transfer->duration}}</p>
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
                                            <a href="{{route('login')}}" class="btn btn-primary d-flex fw-bold header-link h-55px" target="_blank">
                                                <p class="text-center m-auto">{{__('Войти')}}</p>
                                            </a>
                                        </div>
                                        <div class="col-6">
                                            <a href="https://t.me/trip_avia_1_bot" class="btn btn-primary d-flex fw-bold header-link h-55px" target="_blank" style="background-color: #2AABEE; border-color: #2AABEE">
                                                <p class="text-center m-auto">{{__('Войти через Telegram')}} <i class="fab fa-telegram-plane"></i></p>
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
                                    <div class="col">
                                        <fieldset style="all: revert;" class="border border-1 rounded">
                                            <legend style="all: revert;" class="text-black-200 px-2">Email</legend>
                                            <input type="email" name="email" class="w-100" @if(auth()->user()!=null and auth()->user()->email!=null) value="{{auth()->user()->email}}" @endif @if(auth()->user()!=null and auth()->user()->email!=null) readonly @endif required>
                                        </fieldset>
                                    </div>
                                    <div class="col">
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
                            <div class="card-body">
                                <input type="hidden" name="user[{{$passengers_cnt}}][type]" class="w-100" value="взрослый">

                                <div class="row pb-3">
                                    <div class="col d-flex">
                                        <div class="rounded-circle overflow-hidden bg-light w-lg-45px h-lg-45px h-20px w-25px my-auto d-none d-lg-flex">
                                            <i class="fas fa-user m-auto text-black-100 fs-18px"></i>
                                        </div>
                                        <div class="ms-3 d-flex">
                                            <h4 class="my-auto">{{$passengers_cnt}}-{{__('пассажир')}}, {{__('взрослый')}}</h4>
                                        </div>
                                    </div>
                                    <div class="col my-auto">
                                        <more-info-component></more-info-component>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-6 mb-3">
                                        <fieldset style="all: revert;" class="border border-1 rounded">
                                            <legend style="all: revert;" class="text-black-200 px-2">{{__('Фамилия на латинице')}}</legend>
                                            <input type="text" name="user[{{$passengers_cnt}}][surname]" class="w-100 input-words" required value="{{$adult['surname']}}" {{--@if(auth()->user()==null) disabled @endif--}}>
                                        </fieldset>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <fieldset style="all: revert;" class="border border-1 rounded">
                                            <legend style="all: revert;" class="text-black-200 px-2">{{__('Имя на латинице')}}</legend>
                                            <input type="text" name="user[{{$passengers_cnt}}][name]" class="w-100 input-words" required value="{{$adult['name']}}" {{--@if(auth()->user()==null) disabled @endif--}}>
                                        </fieldset>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <fieldset style="all: revert;" class="border border-1 rounded">
                                            <legend style="all: revert;" class="text-black-200 px-2">{{__('Дата рождения')}}</legend>
                                            <input type="date" name="user[{{$passengers_cnt}}][date_of_birth]" class="w-100" required value="{{$adult['date_of_birth']}}" {{--@if(auth()->user()==null) disabled @endif--}}>
                                        </fieldset>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <fieldset style="all: revert;" class="border border-1 rounded">
                                            <legend style="all: revert;" class="text-black-200 px-2">{{__('Пол')}}</legend>
                                            <select class="w-100" name="user[{{$passengers_cnt}}][sex]" {{--@if(auth()->user()==null) disabled @endif--}}>
                                                <option @if($adult['sex']==0) selected @endif value="0">{{__('Женский')}}</option>
                                                <option @if($adult['sex']==1 or !isset($adult['sex'])) selected @endif value="1">{{__('Мужской')}}</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                </div>

                                <div class="row pb-3">
                                    <h4 class="m-0">{{__('Данные паспорта')}}</h4>
                                </div>
                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <fieldset style="all: revert;" class="border border-1 rounded">
                                            <legend style="all: revert;" class="text-black-200 px-2">{{__('Гражданство')}}</legend>
                                            <select class="w-100" name="user[{{$passengers_cnt}}][citizenship]" required {{--@if(auth()->user()==null) disabled @endif--}}>
                                                <option value="1">{{__('Россия')}}</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <fieldset style="all: revert;" class="border border-1 rounded">
                                            <legend style="all: revert;" class="text-black-200 px-2">{{__('Документ')}}</legend>
                                            <select class="w-100" name="user[{{$passengers_cnt}}][doc_type]" required {{--@if(auth()->user()==null) disabled @endif--}}>
                                                <option value="0" @if($adult['doc_type']==0) selected @endif>{{__('Внутренний паспорт РФ')}}</option>
                                                <option value="1" @if($adult['doc_type']==1 or $adult['doc_type']==null) selected @endif>{{__('Заграничный паспорт РФ')}}</option>

                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <fieldset style="all: revert;" class="border border-1 rounded">
                                            <legend style="all: revert;" class="text-black-200 px-2">{{__('Серия и номер документа')}}</legend>
                                            <input type="text" name="user[{{$passengers_cnt}}][serial_number]" class="w-100 input-number" required value="{{$adult['serial_number']}}" {{--@if(auth()->user()==null) disabled @endif--}}>
                                        </fieldset>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <fieldset style="all: revert;" class="border border-1 rounded">
                                            <legend style="all: revert;" class="text-black-200 px-2">{{__('Срок действия')}}</legend>
                                            <input type="date" name="user[{{$passengers_cnt}}][validity]" class="w-100" value="{{$adult['validity']}}" {{--@if(auth()->user()==null) disabled @endif--}}>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        @foreach($children as $child)
                            @php $passengers_cnt++; @endphp
                            @if($passengers_cnt!=1)
                                <div class="col-1 p-0 bg-black m-auto opacity-20 d-none d-lg-block" style="height: 1px; width: 95%"></div>
                            @endif
                            <div class="card-body">
                                <input type="hidden" name="user[{{$passengers_cnt}}][type]" class="w-100" value="ребенок">

                                <div class="row pb-3">
                                    <div class="col d-flex">
                                        <div class="rounded-circle overflow-hidden bg-light w-lg-45px h-lg-45px h-20px w-25px my-auto d-none d-lg-flex">
                                            <i class="fas fa-user m-auto text-black-100 fs-18px "></i>
                                        </div>
                                        <div class="ms-3 d-flex">
                                            <h4 class="my-auto">{{$passengers_cnt}}-{{__('пассажир')}}, {{__('ребенок')}}</h4>
                                        </div>
                                    </div>
                                    <div class="col my-auto">
                                        <more-info-component></more-info-component>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-6 mb-3">
                                        <fieldset style="all: revert;" class="border border-1 rounded">
                                            <legend style="all: revert;" class="text-black-200 px-2">{{__('Фамилия на латинице')}}</legend>
                                            <input type="text" name="user[{{$passengers_cnt}}][surname]" class="w-100 input-words" required value="{{$child['surname']}}" {{--@if(auth()->user()==null) disabled @endif--}}>
                                        </fieldset>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <fieldset style="all: revert;" class="border border-1 rounded">
                                            <legend style="all: revert;" class="text-black-200 px-2">{{__('Имя на латинице')}}</legend>
                                            <input type="text" name="user[{{$passengers_cnt}}][name]" class="w-100 input-words" required value="{{$child['name']}}" {{--@if(auth()->user()==null) disabled @endif--}}>
                                        </fieldset>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <fieldset style="all: revert;" class="border border-1 rounded">
                                            <legend style="all: revert;" class="text-black-200 px-2">{{__('Дата рождения')}}</legend>
                                            <input type="date" name="user[{{$passengers_cnt}}][date_of_birth]" class="w-100" required value="{{$child['date_of_birth']}}" {{--@if(auth()->user()==null) disabled @endif--}}>
                                        </fieldset>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <fieldset style="all: revert;" class="border border-1 rounded">
                                            <legend style="all: revert;" class="text-black-200 px-2">{{__('Пол')}}</legend>
                                            <select class="w-100" name="user[{{$passengers_cnt}}][sex]" {{--@if(auth()->user()==null) disabled @endif--}}>
                                                <option @if($child['sex']==0) selected @endif value="0">{{__('Женский')}}</option>
                                                <option @if($child['sex']==1 or $child['sex']==null) selected @endif value="1">{{__('Мужской')}}</option>

                                            </select>
                                        </fieldset>
                                    </div>
                                </div>

                                <div class="row pb-3">
                                    <h4 class="m-0">{{__('Данные паспорта')}}</h4>
                                </div>
                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <fieldset style="all: revert;" class="border border-1 rounded">
                                            <legend style="all: revert;" class="text-black-200 px-2">{{__('Гражданство')}}</legend>
                                            <select class="w-100" name="user[{{$passengers_cnt}}][citizenship]" required {{--@if(auth()->user()==null) disabled @endif--}}>
                                                <option value="1">{{__('Россия')}}</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <fieldset style="all: revert;" class="border border-1 rounded">
                                            <legend style="all: revert;" class="text-black-200 px-2">{{__('Документ')}}</legend>
                                            <select class="w-100" name="user[{{$passengers_cnt}}][doc_type]" required {{--@if(auth()->user()==null) disabled @endif--}}>
                                                <option value="0" @if($child['doc_type']==0) selected @endif>{{__('Внутренний паспорт РФ')}}</option>
                                                <option value="1" @if($child['doc_type']==1 or $child['doc_type']==null) selected @endif>{{__('Заграничный паспорт РФ')}}</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <fieldset style="all: revert;" class="border border-1 rounded">
                                            <legend style="all: revert;" class="text-black-200 px-2">{{__('Серия и номер документа')}}</legend>
                                            <input type="text" name="user[{{$passengers_cnt}}][serial_number]" class="w-100 input-number" required value="{{$child['serial_number']}}" {{--@if(auth()->user()==null) disabled @endif--}}>
                                        </fieldset>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <fieldset style="all: revert;" class="border border-1 rounded">
                                            <legend style="all: revert;" class="text-black-200 px-2">{{__('Срок действия')}}</legend>
                                            <input type="date" name="user[{{$passengers_cnt}}][validity]" class="w-100" value="{{$child['validity']}}" {{--@if(auth()->user()==null) disabled @endif--}}>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        @foreach($infants as $infant)
                            @php $passengers_cnt++; @endphp
                            @if($passengers_cnt!=1)
                                <div class="col-1 p-0 bg-black m-auto opacity-20 d-none d-lg-block" style="height: 1px; width: 95%"></div>
                            @endif
                            <div class="card-body">
                                <input type="hidden" name="user[{{$passengers_cnt}}][type]" class="w-100" value="младенец">

                                <div class="row pb-3">
                                    <div class="col d-flex">
                                        <div class="rounded-circle overflow-hidden bg-light w-lg-45px h-lg-45px h-20px w-25px my-auto d-none d-lg-flex">
                                            <i class="fas fa-user m-auto text-black-100 fs-18px "></i>
                                        </div>
                                        <div class="ms-3 d-flex">
                                            <h4 class="my-auto">{{$passengers_cnt}}-{{__('пассажир')}}, {{__('младенец')}}</h4>
                                        </div>
                                    </div>
                                    <div class="col my-auto">
                                        <more-info-component></more-info-component>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-6 mb-3">
                                        <fieldset style="all: revert;" class="border border-1 rounded">
                                            <legend style="all: revert;" class="text-black-200 px-2">{{__('Фамилия на латинице')}}</legend>
                                            <input type="text" name="user[{{$passengers_cnt}}][surname]" class="w-100 input-words" required value="{{$infant['surname']}}" {{--@if(auth()->user()==null) disabled @endif--}}>
                                        </fieldset>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <fieldset style="all: revert;" class="border border-1 rounded">
                                            <legend style="all: revert;" class="text-black-200 px-2">{{__('Имя на латинице')}}</legend>
                                            <input type="text" name="user[{{$passengers_cnt}}][name]" class="w-100 input-words" required value="{{$infant['name']}}" {{--@if(auth()->user()==null) disabled @endif--}}>
                                        </fieldset>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <fieldset style="all: revert;" class="border border-1 rounded">
                                            <legend style="all: revert;" class="text-black-200 px-2">{{__('Дата рождения')}}</legend>
                                            <input type="date" name="user[{{$passengers_cnt}}][date_of_birth]" class="w-100" required value="{{$infant['date_of_birth']}}" {{--@if(auth()->user()==null) disabled @endif--}}>
                                        </fieldset>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <fieldset style="all: revert;" class="border border-1 rounded">
                                            <legend style="all: revert;" class="text-black-200 px-2">{{__('Пол')}}</legend>
                                            <select class="w-100" name="user[{{$passengers_cnt}}][sex]" {{--@if(auth()->user()==null) disabled @endif--}}>
                                                <option @if($infant['sex']==0) selected @endif value="0">{{__('Женский')}}</option>
                                                <option @if($infant['sex']==1 or $infant['sex']==null) selected @endif value="1">{{__('Мужской')}}</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                </div>

                                <div class="row pb-3">
                                    <h4 class="m-0">{{__('Данные паспорта')}}</h4>
                                </div>
                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <fieldset style="all: revert;" class="border border-1 rounded">
                                            <legend style="all: revert;" class="text-black-200 px-2">{{__('Гражданство')}}</legend>
                                            <select class="w-100" name="user[{{$passengers_cnt}}][citizenship]" required {{--@if(auth()->user()==null) disabled @endif--}}>
                                                <option value="1">{{__('Россия')}}</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <fieldset style="all: revert;" class="border border-1 rounded">
                                            <legend style="all: revert;" class="text-black-200 px-2">{{__('Документ')}}</legend>
                                            <select class="w-100" name="user[{{$passengers_cnt}}][doc_type]" required {{--@if(auth()->user()==null) disabled @endif--}}>
                                                <option value="0" @if($infant['doc_type']==0) selected @endif>{{__('Внутренний паспорт РФ')}}</option>
                                                <option value="1" @if($infant['doc_type']==1 or $infant['doc_type']==null) selected @endif>{{__('Заграничный паспорт РФ')}}</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <fieldset style="all: revert;" class="border border-1 rounded">
                                            <legend style="all: revert;" class="text-black-200 px-2">{{__('Серия и номер документа')}}</legend>
                                            <input type="text" name="user[{{$passengers_cnt}}][serial_number]" class="w-100 input-number" required value="{{$infant['serial_number']}}" {{--@if(auth()->user()==null) disabled @endif--}}>
                                        </fieldset>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <fieldset style="all: revert;" class="border border-1 rounded">
                                            <legend style="all: revert;" class="text-black-200 px-2">{{__('Срок действия')}}</legend>
                                            <input type="date" name="user[{{$passengers_cnt}}][validity]" class="w-100" value="{{$infant['validity']}}" {{--@if(auth()->user()==null) disabled @endif--}}>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>

                    <div class="card border-0 shadow mb-3">
                        <div class="card-body">
                            <div class="row pb-3">
                                <h4 class="my-auto">{{__('Комментарий к заказу')}}</h4>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <fieldset style="all: revert;" class="border border-1 rounded">
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
                            <div class="row">
                                <div class="col-8">
                                    <h6 class="my-1">{{__('При оплате в рублях:')}}</h6>
                                </div>
                                <div class="col-4">
                                    <h3 class="my-auto fs-20px fw-600 text-end">{{$cookie->booking_price_rub}} ₽</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <p class="text-black-200 mb-1">{{__('или')}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-7">
                                    <h6 class="my-1">{{__('При оплате в евро:')}}</h6>
                                </div>
                                <div class="col-5">
                                    <h5 class="my-auto fs-20px fw-600 text-end">{{$cookie->booking_price_eur}} €</h5>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col d-flex fs-14px text-warning-400 position-relative info cursor-pointer">
                                    <div class="position-absolute card bg-black-300 bottom-100 border-0 opacity-90 w-100 info-banner" style="left: 0">
                                        <div class="card-body">
                                            <p class="text-white fs-12px m-0">{{__('После бронирования авиакомпания может уменьшить тайм-лимит по авиабилетам в одностороннем порядке.')}}</p>
                                        </div>
                                    </div>
                                    <i class="fas fa-info-circle my-auto"></i>
                                    <p class="my-auto ms-2">{{__('Бронь действительна до 7 дней')}}</p>
                                </div>
                            </div>

                            <div class="bg-black opacity-10 d-block w-100 my-3" style="height: 1px;"></div>

                            <div class="row mt-3">
                                <div class="col">
                                    <fieldset class="border border-1 rounded" style="all: revert;">
                                        <legend class="text-black-200 px-2" style="all: revert;">{{__('Промокод')}}</legend>
                                        <input type="text" name="promo" class="w-100"></fieldset>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col">
                                    <button class="btn-primary btn fs-12px h-55px m-auto w-100" {{--@if(auth()->user()==null) disabled @endif--}}>{{__('К оплате')}}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" name="total_rub" value="{{$cookie->booking_price_rub}}">
        <input type="hidden" name="total_eur" value="{{$cookie->booking_price_eur}}">
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
            // document.getElementById('myForm').addEventListener('submit', function() {
            //     inputs.forEach(function(input, index) {
            //         localStorage.removeItem('inputFieldValue_' + index);
            //     });
            // });
        });
    </script>
@endsection
