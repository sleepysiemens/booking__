<div>
    <div class="row">
        <div class="col-8">
            <h6 class="my-1">{{__('При оплате в рублях:')}}</h6>
        </div>
        <div class="col-4">
            <h3 class="my-auto fs-20px fw-600 text-end">{{$total_rub}} ₽</h3>
            <input type="hidden" name="booking_price_rub" value="{{$total_rub}}">

        @if($saled)
                <h3 class="my-auto fs-20px fw-600 text-end text-decoration-line-through">{{$cookie->booking_price_rub}} ₽</h3>
            @endif
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
            <h5 class="my-auto fs-20px fw-600 text-end">{{$total_eur}} €</h5>
            <input type="hidden" name="booking_price_eur" value="{{$total_eur}}">

        @if($saled)
                <h5 class="my-auto fs-20px fw-600 text-end text-decoration-line-through">{{$cookie->booking_price_eur}} €</h5>

            @endif
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
                <input wire:input="promocode($event.target.value)" type="text" name="promo" class="w-100"></fieldset>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col">
            <button id="submit" class="btn-primary btn fs-12px h-55px m-auto w-100" {{--@if(auth()->user()==null) disabled @endif--}}>{{__('К оплате')}}</button>
        </div>

    </div>
</div>
