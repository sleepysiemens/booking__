<div>
    <div class="row px-20px mt-3 justify-content-center pb-50px">

        <div class="col-auto p-0 position-relative">
            <div class="rounded-circle w-20px h-20px border border-3 border-green">
            </div>
            <div class="position-absolute w-100px" style="right: -40px">
                <p class="text-center fw-600 text-green fs-16px mt-2">{{__('Обработка заказа')}}</p>
            </div>
        </div>

        <div class="col-3 p-0 d-flex">
            <div class="w-100 bg-black-200 my-auto opacity-50" style="height: 3px">
            </div>
        </div>

        <div class="col-auto p-0 position-relative">
            <div class="rounded-circle w-20px h-20px border border-3 border-black-200">
            </div>
            <div class="position-absolute w-100px" style="right: -40px">
                <p class="text-center fw-600 text-black-200 fs-16px mt-2">{{__('Подготовка документов')}}</p>
            </div>
        </div>

        <div class="col-3 p-0 d-flex">
            <div class="w-100 bg-black-200 my-auto opacity-50" style="height: 3px">
            </div>
        </div>

        <div class="col-auto p-0 position-relative">
            <div class="rounded-circle w-20px h-20px border border-3 border-black-200 ">
            </div>
            <div class="position-absolute w-100px" style="right: -40px">
                <p class="text-center fw-600 text-black-200 fs-16px mt-2">{{__('Готово')}}</p>
            </div>
        </div>
    </div>

</div>

@php
    //sleep(3);
    //return redirect()->route('order.index', $order_id)
@endphp
