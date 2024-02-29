<div class="w-100 d-flex position-relative" style="height: 50vh;">
    <div class="position-absolute w-100 h-100 z-3 bottom-100"></div>
    <div class="m-auto container rounded-2 bg-white shadow">
        <div class="row mt-4">
            <h2 class="text-center">{{__('Загружаем билеты')}}</h2>
        </div>
        <div class="row d-flex">
            <loading-component
                bg_light="{{asset('img/loading/bg-light.svg')}}"
                bg_dark="{{asset('img/loading/bg-dark.svg')}}"
                building="{{asset('img/loading/building.svg')}}"
                plane="{{asset('img/loading/plane.svg')}}"
            ></loading-component>
        </div>
    </div>
</div>
