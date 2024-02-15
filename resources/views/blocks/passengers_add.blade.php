<form method="post" action="{{route('profile.add_passenger', auth()->user()->id)}}" class="col-lg-9 col-12 ">
    @csrf
    @method('put')
    <div class="card border-0 shadow mb-4">
        <div class="card-body">
            <h4 class="fw-500 mb-3">{{__('Добавить пассажира')}}</h4>
            <div class="row">
                <div class="col-lg-6 col-12 mb-3">
                    <fieldset style="all: revert;" class="border border-1 rounded">
                        <legend style="all: revert;" class="text-black-200 px-2">{{__('Возраст')}}</legend>
                        <select name="type" class="w-100" required>
                            <option value="взрослый">{{__('взрослый')}}</option>
                            <option value="ребенок">{{__('ребенок')}}</option>
                            <option value="младенец">{{__('младенец')}}</option>
                        </select>
                    </fieldset>
                </div>
                <div class="col-lg-6 col-12"></div>
                <div class="col-lg-6 col-12 mb-3">
                    <fieldset style="all: revert;" class="border border-1 rounded">
                        <legend style="all: revert;" class="text-black-200 px-2">{{__('Фамилия')}}</legend>
                        <input type="text" name="surname" class="w-100" required>
                    </fieldset>
                </div>
                <div class="col-lg-6 col-12 mb-3">
                    <fieldset style="all: revert;" class="border border-1 rounded">
                        <legend style="all: revert;" class="text-black-200 px-2">{{__('Имя')}}</legend>
                        <input type="text" name="name" class="w-100" required>
                    </fieldset>
                </div>
                <div class="col-lg-6 col-12 mb-3">
                    <fieldset style="all: revert;" class="border border-1 rounded">
                        <legend style="all: revert;" class="text-black-200 px-2">{{__('Дата рождения')}}</legend>
                        <input type="date" name="date_of_birth" class="w-100" required>
                    </fieldset>
                </div>
                <div class="col-lg-6 col-12 mb-3">
                    <fieldset style="all: revert;" class="border border-1 rounded">
                        <legend style="all: revert;" class="text-black-200 px-2">{{__('Пол')}}</legend>
                        <select class="w-100" name="sex" required>
                            <option value="1">{{__('Мужской')}}</option>
                            <option value="0">{{__('Женский')}}</option>
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
                            <option value="0">{{__('Россия')}}</option>
                        </select>
                    </fieldset>
                </div>
                <div class="col-6 mb-3">
                    <fieldset style="all: revert;" class="border border-1 rounded">
                        <legend style="all: revert;" class="text-black-200 px-2">{{__('Документ')}}</legend>
                        <select class="w-100" name="doc_type" required>
                            <option value="1">{{__('Заграничный паспорт РФ')}}</option>
                            <option value="0">{{__('Внутренний паспорт РФ')}}</option>
                        </select>
                    </fieldset>
                </div>
                <div class="col-6 mb-3">
                    <fieldset style="all: revert;" class="border border-1 rounded">
                        <legend style="all: revert;" class="text-black-200 px-2">{{__('Серия и номер документа')}}</legend>
                        <input type="text" name="serial_number" class="w-100">
                    </fieldset>
                </div>
                <div class="col-6 mb-3">
                    <fieldset style="all: revert;" class="border border-1 rounded">
                        <legend style="all: revert;" class="text-black-200 px-2">{{__('Срок действия')}}</legend>
                        <input type="date" name="validity" class="w-100">
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
