@extends('Layouts.wrapper')

@section('content')
    <!-- BEGIN section -->
    <div class="section section-hero h-300px">
        <!-- BEGIN section-bg -->
        <div class="section-bg with-cover" style="background-image: url({{asset('img/top-view-tourist-items-with-copy-space.jpg')}});"></div>
        <div class="section-bg bg-gray-800 bg-opacity-50"></div>
        <!-- END section-bg -->

        <!-- BEGIN container -->
        <div class="container position-relative">
            <!-- BEGIN section-hero-content -->
            <div class="section-hero-content">
                <!-- BEGIN row -->
                <div class="row">
                    <!-- BEGIN col-8 -->
                    <div class="col-lg-8 col-lg-10 col-lg-12">
                        <!-- BEGIN hero-title-desc -->
                        <h1 class="hero-title mb-3 mt-5 pt-md-5">
                            Бронирование авиабилетов {{--для визы--}}
                        </h1>
                        <!-- END hero-title-desc -->
                    </div>
                    <!-- END col-8 -->
                </div>
                <!-- END row -->
            </div>
            <!-- END section-hero-content -->
        </div>
        <!-- END container -->
    </div>
    <!-- END section -->
    <div class="section bg-light pt-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-12">
                    <div class="card border-0 shadow mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-lg-6 d-flex pb-3">
                                    <div class="rounded-circle overflow-hidden bg-light w-45px h-45px my-auto d-flex">
                                        <i class="fas fa-plane-departure m-auto text-black-100 fs-18px"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h4 class="m-0">Новосибирск - Красноярск</h4>
                                        <p class="text-warning m-0">1 пересадка</p>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="d-flex justify-content-start justify-content-lg-end">
                                        <div class="rounded-circle overflow-hidden bg-primary w-25px h-25px my-auto">
                                            <img class="w-100 h-100" src="http://127.0.0.1:8000/img/SU.png" alt="avia">
                                        </div>
                                        <p class="my-auto ms-2">Аэрофлот</p>
                                    </div>
                                </div>
                            </div>
                            <div style="" id="details-long-1">
                                <div class="row row-cols-lg-4 mt-3">
                                    <div class="col">
                                        <div class="container">
                                            <p class="text-dark mb-0">21 января, вс</p>
                                            <h2 class="fw-400 my-1 ff-montserrat">18:25</h2>
                                            <p class="text-dark fw-300 mt-0">Россия, Новосибирск (OVB)</p>
                                        </div>
                                    </div>
                                    <div class="col d-flex opacity-25">
                                        <div class="bg-black w-100 my-auto position-relative" style="height: 2px">
                                        </div>
                                        <i class="fas fa-caret-right my-auto" aria-hidden="true"></i>
                                    </div>
                                    <div class="col">
                                        <div class="container">
                                            <p class="text-dark mb-0">21 января, вс</p>
                                            <h2 class="fw-400 my-1 ff-montserrat">06:55</h2>
                                            <p class="text-dark fw-300 mt-0 fs-12px">Россия, Москва (MOW)</p>
                                        </div>
                                    </div>
                                    <div class="col d-none d-lg-block">
                                        <div class="container">
                                            <p class="fw-500 mb-0">4 ч 30 мин</p>
                                            <p class="fw-400 fs-12px text-green mb-0">прямой</p>
                                            <p class="fw-400 fs-12px text-black-200">Рейс SU-1461</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="container">
                                    <div class="card bg-light border-light">
                                        <div class="card-body row text-black-200 py-2">
                                            <div class="col d-flex">
                                                <i class="far fa-clock my-auto" aria-hidden="true"></i>
                                                <p class="m-0 my-auto ms-2">Пересадка</p>
                                            </div>
                                            <div class="col d-flex justify-content-end">
                                                <p class="m-0 my-auto">3 ч 20 мин</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row row-cols-lg-4 mt-3">
                                    <div class="col">
                                        <div class="container">
                                            <p class="text-dark mb-0">21 января, вс</p>
                                            <h2 class="fw-400 my-1 ff-montserrat">18:25</h2>
                                            <p class="text-dark fw-300 mt-0">Россия, Новосибирск (OVB)</p>
                                        </div>
                                    </div>
                                    <div class="col d-flex opacity-25">
                                        <div class="bg-black w-100 my-auto position-relative" style="height: 2px">
                                        </div>
                                        <i class="fas fa-caret-right my-auto" aria-hidden="true"></i>
                                    </div>
                                    <div class="col">
                                        <div class="container">
                                            <p class="text-dark mb-0">21 января, вс</p>
                                            <h2 class="fw-400 my-1 ff-montserrat">06:55</h2>
                                            <p class="text-dark fw-300 mt-0">Россия, Москва (MOW)</p>
                                        </div>
                                    </div>
                                    <div class="col d-none d-lg-block">
                                        <div class="container">
                                            <p class="fw-500 mb-0">4 ч 30 мин</p>
                                            <p class="fw-400 fs-12px text-green mb-0">прямой</p>
                                            <p class="fw-400 fs-12px text-black-200">Рейс SU-1461</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card border-0 shadow mb-3">
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

                    <div class="card border-0 shadow mb-3">
                        <div class="card-body">
                            <div class="row pb-3">
                                <div class="col d-flex">
                                    <div class="rounded-circle overflow-hidden bg-light w-lg-45px h-lg-45px h-20px w-25px my-auto d-none d-lg-flex">
                                        <i class="fas fa-user m-auto text-black-100 fs-18px "></i>
                                    </div>
                                    <div class="ms-3 d-flex">
                                        <h4 class="my-auto">1-пассажир, взрослый</h4>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="d-flex justify-content-end text-black-200 info position-relative">
                                        <div class="card info-banner position-absolute w-100 bg-light" style="right: 200px">
                                            <div class="card-body">
                                                <h6 class="mb-2">Как заполнить данные</h6>
                                                <p class="mb-0"><b>Общая информация</b></p>
                                                <p>
                                                    Данные для оформления брони билетов должны соответствовать документу пассажира, по которому он собирается путешествовать. При вводе данных все буквы должны быть написаны латиницей (в английской раскладке клавиатуры), без пробелов и дефисов. Двойная фамилия указывается слитно, без пробелов и дефисов.
                                                </p>
                                                <p class="mb-1"><b>Паспорт</b></p>
                                                <ul>
                                                    <li >
                                                        <p class="mb-0">Написание как в документе 1234567890</p>
                                                    </li>
                                                    <li>
                                                        <p>Срок действия паспорта (до какого годен) указывается при наличии</p>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                        <i class="far fa-question-circle my-auto"></i>
                                        <p class="my-auto ms-1">Как заполнить данные</p>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-6 mb-3">
                                    <fieldset style="all: revert;" class="border border-1 rounded">
                                        <legend style="all: revert;" class="text-black-200 px-2">Фамилия на латинице</legend>
                                        <input type="text" name="surname" class="w-100">
                                    </fieldset>
                                </div>
                                <div class="col-6 mb-3">
                                    <fieldset style="all: revert;" class="border border-1 rounded">
                                        <legend style="all: revert;" class="text-black-200 px-2">Имя на латинице</legend>
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

                            <div class="row pb-3">
                                <h4 class="m-0">Данные паспорта</h4>
                            </div>
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

                    <div class="card border-0 shadow mb-3">
                        <div class="card-body">
                            <div class="row pb-3">
                                <h4 class="my-auto">Комментарий к заказу</h4>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <fieldset style="all: revert;" class="border border-1 rounded">
                                        <legend style="all: revert;" class="text-black-200 px-2">Комментарий к заказу</legend>
                                        <textarea name="comment" class="w-100 h-100px"></textarea>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-12">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <h6 class="my-auto">1 пассажир</h6>
                                </div>
                                <div class="col-6">
                                    <h6 class="my-auto fw-500 text-end">699 ₽ / 14 €</h6>
                                </div>
                            </div>
                            <div class="bg-black opacity-10 d-block w-100 my-3" style="height: 1px;"></div>
                            <div class="row">
                                <div class="col-8">
                                    <h6 class="my-1">При оплате в рублях:</h6>
                                </div>
                                <div class="col-4">
                                    <h3 class="my-auto">699 ₽</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <p class="text-black-200 mb-1">или</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-8">
                                    <h6 class="my-1">При оплате в евро:</h6>
                                </div>
                                <div class="col-4">
                                    <h5 class="my-auto">14 €</h5>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col d-flex fs-14px text-warning-400 position-relative info cursor-pointer">
                                    <div class="position-absolute card bg-black-300 bottom-100 border-0 opacity-90 w-100 info-banner" style="left: 0">
                                        <div class="card-body">
                                            <p class="text-white fs-12px m-0">После бронирования авиакомпания может уменьшить тайм-лимит по авиабилетам в одностороннем порядке.</p>
                                        </div>
                                    </div>
                                    <i class="fas fa-info-circle my-auto"></i>
                                    <p class="my-auto ms-2">Бронь действительна до 7 дней</p>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col">
                                    <button class="btn-primary btn fs-12px h-55px m-auto w-100">К оплате</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
