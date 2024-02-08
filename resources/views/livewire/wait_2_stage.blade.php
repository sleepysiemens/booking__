<div>
    <div class="row px-20px mt-3 justify-content-center pb-50px">

        <div class="col-auto p-0 position-relative">
            <div class="rounded-circle w-20px h-20px border border-3 border-green">
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
            <div class="w-100 bg-black-200 my-auto" style="height: 3px">
            </div>
        </div>

        <div class="col-auto p-0 position-relative">
            <div class="rounded-circle w-20px h-20px border border-3 border-black-200 ">
            </div>
            <div class="position-absolute w-100px" style="right: -40px">
                <p class="text-center fw-400 text-black-200 fs-16px mt-2">Готово</p>
            </div>
        </div>
    </div>

    <div class="mt-5">
        <h4 class="text-center m-0 text-primary opacity-70">Обычно это занимает до 10 минут.</h4>
        <loading-component
            bg_light="{{asset('img/loading/bg-light.svg')}}"
            bg_dark="{{asset('img/loading/bg-dark.svg')}}"
            building="{{asset('img/loading/building.svg')}}"
            plane="{{asset('img/loading/plane.svg')}}"
        ></loading-component>
    </div>

</div>
