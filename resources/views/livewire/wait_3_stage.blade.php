<div>
    <div class="row justify-content-center my-3">
        <div class="col-lg-3 col-6 d-flex">
            <img class="w-100 opacity-70 m-auto" src="{{asset('img/four_check_star_mark_circles-ai.png')}}" alt="img">
        </div>
    </div>

    <div class="row px-20px mt-3 justify-content-center pb-50px">

        <div class="col-auto p-0 position-relative">
            <div class="rounded-circle w-20px h-20px border border-3 border-green ">
            </div>
            <div class="position-absolute w-100px" style="right: -40px">
                <p class="text-center fw-400 text-green fs-16px mt-2">Обработка заказа</p>
            </div>
        </div>

        <div class="col-3 p-0 d-flex">
            <div class="w-100 bg-green my-auto" style="height: 3px">
            </div>
        </div>

        <div class="col-auto p-0 position-relative">
            <div class="rounded-circle w-20px h-20px border border-3 border-green">
            </div>
            <div class="position-absolute w-100px" style="right: -40px">
                <p class="text-center fw-400  text-green fs-16px mt-2">Подготовка документов</p>
            </div>
        </div>

        <div class="col-3 p-0 d-flex">
            <div class="w-100 bg-green my-auto" style="height: 3px">
            </div>
        </div>

        <div class="col-auto p-0 position-relative">
            <div class="rounded-circle w-20px h-20px border border-3 border-green ">
            </div>
            <div class="position-absolute w-100px" style="right: -40px">
                <p class="text-center fw-400 text-green fs-16px mt-2">Готово</p>
            </div>
        </div>
    </div>

    <div class="row px-20px mt-4">
        <div class="col-12 p-0 bg-black m-auto opacity-10" style="height: 2px"></div>
    </div>

    <div class="row mt-4 mb-3 h-50px px-20px">
            <div class="col">
                <button class="d-flex btn btn-primary w-100 h-50px">
                    <p class="m-auto fs-12px d-block d-sm-none">Скачать билет</p>
                    <p class="m-auto fs-16px d-none d-lg-block">Скачать билет</p>
                </button>
            </div>
            <div class="col">
                <a href="{{route('ticket.index')}}" class="d-flex btn btn-white border-2 w-100 h-50px" target="_blank">
                    <p class="m-auto fs-12px d-block d-sm-none">Посмотреть билет</p>
                    <p class="m-auto fs-16px d-none d-lg-block">Посмотреть билет</p>
                </a>
            </div>
    </div>


</div>
