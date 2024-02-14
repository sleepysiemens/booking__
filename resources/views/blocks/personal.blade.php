<form method="post" action="{{route('profile.update', auth()->user()->id)}}" class="col-lg-9 col-12 sec sec-active" id="personal">
    @csrf
    @method('patch')
    <div class="card border-0 shadow mb-4">
        <div class="card-body">
            <h4 class="fw-500 mb-3">{{__('Персональные данные')}}</h4>
            <div class="row">
                <div class="col-6 mb-3">
                    <fieldset style="all: revert;" class="border border-1 rounded">
                        <legend style="all: revert;" class="text-black-200 px-2">{{__('Фамилия')}}</legend>
                        <input type="text" name="surname" class="w-100" value="{{auth()->user()->surname}}" required>
                    </fieldset>
                </div>
                <div class="col-6 mb-3">
                    <fieldset style="all: revert;" class="border border-1 rounded">
                        <legend style="all: revert;" class="text-black-200 px-2">{{__('Имя')}}</legend>
                        <input type="text" name="name" class="w-100" value="{{auth()->user()->name}}" required>
                    </fieldset>
                </div>
                <div class="col-6 mb-3">
                    <fieldset style="all: revert;" class="border border-1 rounded">
                        <legend style="all: revert;" class="text-black-200 px-2">{{__('Дата рождения')}}</legend>
                        <input type="date" name="date_of_birth" class="w-100" value="{{auth()->user()->date_of_birth}}" required>
                    </fieldset>
                </div>
                <div class="col-6 mb-3">
                    <fieldset style="all: revert;" class="border border-1 rounded">
                        <legend style="all: revert;" class="text-black-200 px-2">{{__('Пол')}}</legend>
                        <select class="w-100" name="sex" required>
                            <option @if(auth()->user()->sex!=null and auth()->user()->sex==1) selected @endif value="1">{{__('Мужской')}}</option>
                            <option @if(auth()->user()->sex!=null and auth()->user()->sex==0) selected @endif value="0">{{__('Женский')}}</option>
                        </select>
                    </fieldset>
                </div>
            </div>

            <div class="bg-black opacity-20 d-block w-100 my-3" style="height: 1px;"></div>

            <h4 class="fw-400 mb-3">{{__('Данные паспорта')}}</h4>
            <div class="row">
                <div class="col-6 mb-3">
                    <fieldset style="all: revert;" class="border border-1 rounded">
                        <legend style="all: revert;" class="text-black-200 px-2">{{__('Гражданство')}}</legend>
                        <select class="w-100" name="citizenship" required>
                            <option @if(auth()->user()->citizenship!=null and auth()->user()->citizenship==0) selected @endif value="0">{{__('Россия')}}</option>
                        </select>
                    </fieldset>
                </div>
                <div class="col-6 mb-3">
                    <fieldset style="all: revert;" class="border border-1 rounded">
                        <legend style="all: revert;" class="text-black-200 px-2">{{__('Документ')}}</legend>
                        <select class="w-100" name="doc_type" required>
                            <option @if(auth()->user()->doc_type!=null and auth()->user()->doc_type==1) selected @endif value="1">{{__('Заграничный паспорт РФ')}}</option>
                            <option @if(auth()->user()->doc_type==0) selected @endif value="0">{{__('Внутренний паспорт РФ')}}</option>
                        </select>
                    </fieldset>
                </div>
                <div class="col-6 mb-3">
                    <fieldset style="all: revert;" class="border border-1 rounded">
                        <legend style="all: revert;" class="text-black-200 px-2">{{__('Серия и номер документа')}}</legend>
                        <input type="text" name="serial_number" class="w-100" value="{{auth()->user()->serial_number}}">
                    </fieldset>
                </div>
                <div class="col-6 mb-3">
                    <fieldset style="all: revert;" class="border border-1 rounded">
                        <legend style="all: revert;" class="text-black-200 px-2">{{__('Срок действия')}}</legend>
                        <input type="date" name="validity" class="w-100" value="{{auth()->user()->validity}}">
                    </fieldset>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow mb-4">
        <div class="card-body">
            <h4 class="m-0">{{__('Контактные данные')}}</h4>
            <div class="row pb-2 mt-3">
                <div class="col">
                    <fieldset style="all: revert;" class="border border-1 rounded">
                        <legend style="all: revert;" class="text-black-200 px-2">Email</legend>
                        <input type="email" name="email" class="w-100" value="{{auth()->user()->email}}" required>
                    </fieldset>
                </div>
                <div class="col">
                    <fieldset style="all: revert;" class="border border-1 rounded">
                        <legend style="all: revert;" class="text-black-200 px-2">{{__('Телефон')}}</legend>
                        <input type="tel" name="phone" class="w-100" value="{{auth()->user()->phone}}">
                    </fieldset>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="container ms-0 col-lg-5 col-12">
            <button class="btn btn-primary d-flex h-50px w-100">
                <p class="m-auto">{{__('Сохранить')}}</p>
            </button>
        </div>
    </div>
</form>
