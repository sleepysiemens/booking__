<div class="col-lg-9 col-12">
    <div class="row">
        <div class="col d-flex">
            <h4 class="fw-500 my-auto">{{__('Пассажиры')}}</h4>
        </div>
        <div class="col justify-content-end d-flex">
            <a href="{{route('profile.new_passenger')}}" class="btn btn-primary d-flex h-50px">
                <p class="m-auto fw-500">{{__('Добавить пассажира')}}</p>
            </a>
        </div>
    </div>
    @php $passengers_cnt=0; @endphp
        @forelse($passengers as $passenger)
            @php $passengers_cnt++ @endphp
            <div class="card border-0 shadow mt-3">
                <div class="card-body">
                    <h4 class="fw-500 mb-3">{{__('Пассажир')}} - {{$passengers_cnt}}, {{__($passenger->type)}}</h4>
                    <div class="row">
                        <div class="col-lg-6 col-12 mb-3">
                            <fieldset class="border border-1 rounded" style="all: revert;">
                                <legend class="text-black-200 px-2" style="all: revert;">{{__('Фамилия')}}</legend>
                                <input type="text" class="w-100" readonly value="{{$passenger->surname}}">
                            </fieldset>
                        </div>
                        <div class="col-lg-6 col-12 mb-3">
                            <fieldset class="border border-1 rounded" style="all: revert;">
                                <legend class="text-black-200 px-2" style="all: revert;">{{__('Имя')}}</legend>
                                <input type="text" class="w-100" readonly value="{{$passenger->name}}">
                            </fieldset>
                        </div>
                        <div class="col-lg-6 col-12 mb-3">
                            <fieldset class="border border-1 rounded" style="all: revert;">
                                <legend class="text-black-200 px-2" style="all: revert;">{{__('Дата рождения')}}</legend>
                                <input type="text" class="w-100" readonly value="{{$passenger->date_of_birth}}">
                            </fieldset>
                        </div>
                        <div class="col-lg-6 col-12 mb-3">
                            <fieldset class="border border-1 rounded" style="all: revert;">
                                <legend class="text-black-200 px-2" style="all: revert;">{{__('Пол')}}</legend>
                                <input type="text" class="w-100" readonly value="@if($passenger->sex=='1'){{__('Мужской')}}@else {{__('Женский')}} @endif">
                            </fieldset>
                        </div>
                    </div>
                    <div class="bg-black opacity-20 d-block w-100 my-3" style="height: 1px;"></div>
                    <h4 class="fw-400 mb-3">{{__('Данные паспорта')}}</h4><div class="row">
                        <div class="col-lg-6 col-12 mb-3">
                            <fieldset class="border border-1 rounded" style="all: revert;">
                                <legend class="text-black-200 px-2" style="all: revert;">{{__('Гражданство')}}</legend>
                                <input type="text" class="w-100" readonly value="@if($passenger->citizenship=='0'){{__('Россия')}} @endif">
                            </fieldset>
                        </div>
                        <div class="col-lg-6 col-12 mb-3">
                            <fieldset class="border border-1 rounded" style="all: revert;">
                                <legend class="text-black-200 px-2" style="all: revert;">{{__('Документ')}}</legend>
                                <input type="text" class="w-100" readonly value="@if($passenger->doc_type=='1'){{__('Заграничный паспорт РФ')}}@else {{__('Внутренний паспорт РФ')}} @endif">

                            </fieldset>
                        </div>
                        <div class="col-lg-6 col-12 mb-3">
                            <fieldset class="border border-1 rounded" style="all: revert;">
                                <legend class="text-black-200 px-2" style="all: revert;">{{__('Серия и номер документа')}}</legend>
                                <input type="text" class="w-100" value="{{__($passenger->serial_number)}}">
                            </fieldset>
                        </div>
                        <div class="col-lg-6 col-12 mb-3">
                            <fieldset class="border border-1 rounded" style="all: revert;">
                                <legend class="text-black-200 px-2" style="all: revert;">{{__('Срок действия')}}</legend>
                                <input type="text" class="w-100" value="{{__($passenger->validity)}}" readonly>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        @empty
        <div class="section h-100">
            <div class="row">
                <div class="col">
                    <h2 class="text-center">{{__('Пассажиров пока нет')}}</h2>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p class="text-center">{{__('Создайте пассажиров, чтобы быстро добавлять их в бронирования')}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <a class="btn btn-primary d-flex w-200px h-50px m-auto" href="{{asset(route('main.index'))}}">
                        <p class="m-auto fw-500">{{__('На главную')}}</p>
                    </a>
                </div>
            </div>
        </div>
        @endforelse
</div>
