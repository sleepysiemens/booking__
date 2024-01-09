<div class="col-lg-9 col-12 sec sec-active" id="personal">
    <div class="card border-0 shadow mb-4">
        <div class="card-body">
            <h4 class="fw-500 mb-3">Персональные данные</h4>
            <div class="row">
                <div class="col-6 mb-3">
                    <fieldset style="all: revert;" class="border border-1 rounded">
                        <legend style="all: revert;" class="text-black-200 px-2">Фамилия</legend>
                        <input type="text" name="surname" class="w-100">
                    </fieldset>
                </div>
                <div class="col-6 mb-3">
                    <fieldset style="all: revert;" class="border border-1 rounded">
                        <legend style="all: revert;" class="text-black-200 px-2">Имя</legend>
                        <input type="text" name="name" class="w-100">
                    </fieldset>
                </div>
                <div class="col-6 mb-3">
                    <fieldset style="all: revert;" class="border border-1 rounded">
                        <legend style="all: revert;" class="text-black-200 px-2">Дата рождения</legend>
                        <input type="date" name="date" class="w-100">
                    </fieldset>
                </div>
                <div class="col-6 mb-3">
                    <fieldset style="all: revert;" class="border border-1 rounded">
                        <legend style="all: revert;" class="text-black-200 px-2">Пол</legend>
                        <select class="w-100" name="sex">
                            <option value="m">Мужской</option>
                            <option value="f">Женский</option>
                        </select>
                    </fieldset>
                </div>
            </div>

            <div class="bg-black opacity-20 d-block w-100 my-3" style="height: 1px;"></div>

            <h4 class="fw-400 mb-3">Данные паспорта</h4>
            <div class="row">
                <div class="col-6 mb-3">
                    <fieldset style="all: revert;" class="border border-1 rounded">
                        <legend style="all: revert;" class="text-black-200 px-2">Гражданство</legend>
                        <select class="w-100" name="country">
                            <option value="Russia">Россия</option>
                        </select>
                    </fieldset>
                </div>
                <div class="col-6 mb-3">
                    <fieldset style="all: revert;" class="border border-1 rounded">
                        <legend style="all: revert;" class="text-black-200 px-2">Документ</legend>
                        <select class="w-100" name="doc">
                            <option value="zag">Заграничный паспорт РФ</option>
                            <option value="vn">Внутренний паспорт РФ</option>
                        </select>
                    </fieldset>
                </div>
                <div class="col-6 mb-3">
                    <fieldset style="all: revert;" class="border border-1 rounded">
                        <legend style="all: revert;" class="text-black-200 px-2">Номер документа</legend>
                        <input type="text" name="number" class="w-100">
                    </fieldset>
                </div>
                <div class="col-6 mb-3">
                    <fieldset style="all: revert;" class="border border-1 rounded">
                        <legend style="all: revert;" class="text-black-200 px-2">Серия документа</legend>
                        <input type="text" name="serial" class="w-100">
                    </fieldset>
                </div>
                <div class="col-6 mb-3">
                    <fieldset style="all: revert;" class="border border-1 rounded">
                        <legend style="all: revert;" class="text-black-200 px-2">Срок действия</legend>
                        <input type="date" name="serial" class="w-100">
                    </fieldset>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow mb-4">
        <div class="card-body">
            <h4 class="m-0">Контактные данные</h4>
            <p class="opacity-50 mt-2">На почту мы отправим документ “Подтверждение бронирования”</p>
            <div class="row pb-2">
                <div class="col">
                    <fieldset style="all: revert;" class="border border-1 rounded">
                        <legend style="all: revert;" class="text-black-200 px-2">Email</legend>
                        <input type="email" name="email" class="w-100">
                    </fieldset>
                </div>
                <div class="col">
                    <fieldset style="all: revert;" class="border border-1 rounded">
                        <legend style="all: revert;" class="text-black-200 px-2">Телефон</legend>
                        <input type="tel" name="phone" class="w-100">
                    </fieldset>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="container ms-0 col-lg-5 col-12">
            <button class="btn btn-primary d-flex h-50px w-100">
                <p class="m-auto">Сохранить</p>
            </button>
        </div>
    </div>
</div>
