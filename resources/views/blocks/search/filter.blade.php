{{--FILTER--}}
<div class="col-lg-3 col ps-lg-0 d-lg-block mb-3" id="filter-div">
    {{--Filter card--}}
    <div class="card border-0 shadow mb-3">
        <div class="card-body">
            <div class="row">
                <p class="fs-16px col mb-0">Пересадки</p>
                <a class="col-2 text-black opacity-50 d-flex filter-btn cursor-pointer" id="transfer-btn">
                    {{--<i class="fas fa-chevron-down m-auto"></i>--}}
                </a>
            </div>
            <div class="container" id="transfer">
                @foreach($transfers_filters as $transfers_filter)
                    <div class="row pt-3">
                        <input wire:model.live="transfer" class="col-1 h-20px my-auto" type="radio" value="{{$transfers_filter['transfers_amount']}}">
                        <label class="col-auto"><p class="m-auto">@if($transfers_filter['transfers_amount']==0) Без пересадок@else Пересадок: {{$transfers_filter['transfers_amount']}} @endif</p></label>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    {{--/Filter card--}}

    {{--Filter card--}}
    <div class="card border-0 shadow mb-3">
        <div class="card-body">
            <div class="row">
                <p class="fs-16px col mb-0">Авиакомпании</p>
                <a class="col-2 text-black opacity-50 d-flex filter-btn cursor-pointer" id="avia-btn">
                    {{--<i class="fas fa-chevron-down m-auto"></i>--}}
                </a>
            </div>
            <div class="container" id="avia">
                @php $ii=0; @endphp
                @foreach($airlines_filter as $airline)
                    @php $ii++; @endphp
                    <div class="row pt-3">
                        <input wire:model.live="airlines" class="col-1 h-20px my-auto" type="checkbox" value="{{$airline['airline']}}" id="company-{{$ii}}">
                        <label class="col-auto d-flex" for="company-{{$ii}}">
                            <div class="rounded-circle overflow-hidden bg-primary w-25px h-25px my-auto d-flex">
                                <img class="w-75 h-75 m-auto" src="https://static.onetwotrip.com/images/airlines/svg/{{$airline['airline_short']}}.svg" alt="avia">
                            </div>
                            <p class="m-auto ms-2">{{$airline['airline']}}</p>
                        </label>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    {{--/Filter card--}}

    {{--Filter card--}}
    <div class="card border-0 shadow mb-3">
        <div class="card-body">
            <div class="row">
                <p class="fs-16px col mb-0">Вылет и прибытие</p>
                <a class="col-2 text-black opacity-50 d-flex filter-btn cursor-pointer" id="flight-btn">
                    {{--<i class="fas fa-chevron-down m-auto"></i>--}}
                </a>
            </div>
            <div class="container pt-2" id="flight">
                <p class="opacity-70">Вылет</p>
                <div class="row mb-3">
                    <input wire:model.live="depart_start_time_filter" class="col-5 m-auto border border-primary rounded py-2 fs-16px" type="time">
                    <p class="col-auto m-auto">-</p>
                    <input wire:model.live="depart_end_time_filter" class="col-5 m-auto border border-primary rounded py-2 fs-16px" type="time">
                </div>

                <p class="opacity-70">Прибытие</p>
                <div class="row mb-3">
                    <input wire:model.live="arrival_start_time_filter" class="col-5 m-auto border border-primary rounded py-2 fs-16px" type="time">
                    <p class="col-auto m-auto">-</p>
                    <input wire:model.live="arrival_end_time_filter" class="col-5 m-auto border border-primary rounded py-2 fs-16px" type="time">
                </div>
            </div>
        </div>
    </div>
    {{--/Filter card--}}
    <div class="container fs-16px text-primary">
        <input type="radio" wire:model.live="reset_filter" id="reset_filter" value="1" class="d-none">
        <label for="reset_filter" class="cursor-pointer"><i class="fas fa-times"></i> Сбросить фильтр</label>
    </div>
</div>
{{--/FILTER--}}
<div class="section bg-light py-3 d-lg-none">
    <div class="container">
        <button class="btn border-primary border-2 bg-primary-100 text-primary w-100 d-flex shadow h-50px justify-content-center" id="filter-btn">
            <i class="fas fa-filter my-auto"></i>
            <p class="my-auto ms-2">Фильтр</p>
        </button>
    </div>
</div>
