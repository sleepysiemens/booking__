<div class="card-body">
    <input type="hidden" name="user[{{$passengers_cnt}}][type]" class="w-100" value="ребенок">

    <div class="row pb-3">
        <div class="col-lg-6 col-12 d-flex">
            <div class="rounded-circle overflow-hidden bg-light w-lg-45px h-lg-45px h-20px w-25px my-auto d-none d-lg-flex">
                <i class="fas fa-user m-auto text-black-100 fs-18px "></i>
            </div>
            <div class="ms-3 d-flex">
                <h4 class="my-auto">{{$passengers_cnt}}-{{__('пассажир')}}, {{__('ребенок')}}</h4>
            </div>
        </div>
        <div class="col-lg-6 col-12 my-auto">
            <more-info-component></more-info-component>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-6 col-12 mb-3">
            <fieldset style="all: revert;" class="border border-1 rounded">
                <legend style="all: revert;" class="text-black-200 px-2">{{__('Фамилия на латинице')}}</legend>
                <input type="text" name="user[{{$passengers_cnt}}][surname]" class="w-100 input-words" required value="{{$child['surname']}}" {{--@if(auth()->user()==null) disabled @endif--}}>
            </fieldset>
        </div>
        <div class="col-lg-6 col-12 mb-3">
            <fieldset style="all: revert;" class="border border-1 rounded">
                <legend style="all: revert;" class="text-black-200 px-2">{{__('Имя на латинице')}}</legend>
                <input type="text" name="user[{{$passengers_cnt}}][name]" class="w-100 input-words" required value="{{$child['name']}}" {{--@if(auth()->user()==null) disabled @endif--}}>
            </fieldset>
        </div>
        <div class="col-lg-6 col-12 mb-3">
            <fieldset style="all: revert;" class="border border-1 rounded">
                <legend style="all: revert;" class="text-black-200 px-2">{{__('Дата рождения')}}</legend>
                <input type="date" name="user[{{$passengers_cnt}}][date_of_birth]" min="{{date("Y-m-d",strtotime("- 12 years"))}}" max="{{date("Y-m-d",strtotime("- 2 years"))}}" class="w-100" required value="{{$child['date_of_birth']}}" {{--@if(auth()->user()==null) disabled @endif--}}>
            </fieldset>
        </div>
        <div class="col-lg-6 col-12 mb-3">
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
        <div class="col-lg-6 col-12 mb-3">
            <fieldset style="all: revert;" class="border border-1 rounded">
                <legend style="all: revert;" class="text-black-200 px-2">{{__('Гражданство')}}</legend>
                <select class="w-100" name="user[{{$passengers_cnt}}][citizenship]" required {{--@if(auth()->user()==null) disabled @endif--}}>
                    <option value="1">{{__('Россия')}}</option>
                </select>
            </fieldset>
        </div>
        <div class="col-lg-6 col-12 mb-3">
            <fieldset style="all: revert;" class="border border-1 rounded">
                <legend style="all: revert;" class="text-black-200 px-2">{{__('Документ')}}</legend>
                <select class="w-100" name="user[{{$passengers_cnt}}][doc_type]" required {{--@if(auth()->user()==null) disabled @endif--}}>
                    <option value="0" @if($child['doc_type']==0) selected @endif>{{__('Внутренний паспорт РФ')}}</option>
                    <option value="1" @if($child['doc_type']==1 or $child['doc_type']==null) selected @endif>{{__('Заграничный паспорт РФ')}}</option>
                </select>
            </fieldset>
        </div>
        <div class="col-lg-6 col-12 mb-3">
            <fieldset style="all: revert;" class="border border-1 rounded">
                <legend style="all: revert;" class="text-black-200 px-2">{{__('Серия и номер документа')}}</legend>
                <input type="text" name="user[{{$passengers_cnt}}][serial_number]" class="w-100 input-number" required value="{{$child['serial_number']}}" {{--@if(auth()->user()==null) disabled @endif--}}>
            </fieldset>
        </div>
        <div class="col-lg-6 col-12 mb-3">
            <fieldset style="all: revert;" class="border border-1 rounded">
                <legend style="all: revert;" class="text-black-200 px-2">{{__('Срок действия')}}</legend>
                <input type="date" name="user[{{$passengers_cnt}}][validity]" min="{{date("Y-m-d", $cookie->arrival_datetime)}}" class="w-100" value="{{$child['validity']}}" {{--@if(auth()->user()==null) disabled @endif--}}>
            </fieldset>
        </div>
    </div>
</div>
