{{--FILTER--}}
<div class="col-lg-3 col ps-lg-0 d-lg-block mb-3" id="filter-div">
    {{--Filter card--}}
    <div class="card border-0 shadow mb-3">
        <div class="card-body">
            <div class="row">
                <p class="fs-16px col mb-0">Пересадки</p>
                <a class="col-2 text-black opacity-50 d-flex filter-btn cursor-pointer" id="transfer-btn">
                    <i class="fas fa-chevron-down m-auto"></i>
                </a>
            </div>
            <div class="container" id="transfer">
                    <div class="row pt-3">
                        <input class="col-1 h-20px my-auto" type="checkbox" id="transfer-0" name="transfer" value="0">
                        <label class="col-auto" for="transfer-0"><p class="m-auto">Без пересадок</p></label>
                    </div>
                    <div class="row pt-3">
                        <input class="col-1 h-20px my-auto" type="checkbox" id="transfer-1" name="transfer" value="1">
                        <label class="col-auto" for="transfer-1"><p class="m-auto">С пересадками</p></label>
                    </div>
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
                    <i class="fas fa-chevron-down m-auto"></i>
                </a>
            </div>
            <div class="container" id="avia">
                @php $ii=0; @endphp
                @foreach($airlines_filter as $airline)
                    @php $ii++; @endphp
                    <div class="row pt-3">
                        <input class="col-1 h-20px my-auto" type="checkbox" id="company-{{$ii}}">
                        <label class="col-auto d-flex" for="company-{{$ii}}">
                            <div class="rounded-circle overflow-hidden bg-primary w-25px h-25px my-auto">
                                <img class="w-100 h-100" src="{{asset('img/SU.png')}}" alt="avia">
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
                    <i class="fas fa-chevron-down m-auto"></i>
                </a>
            </div>
            <div class="container pt-2" id="flight">
                <p class="opacity-70">Вылет</p>
                <div class="row mb-3">
                    <input class="col-5 m-auto border border-primary rounded py-2 fs-16px" type="time">
                    <p class="col-auto m-auto">-</p>
                    <input class="col-5 m-auto border border-primary rounded py-2 fs-16px" type="time">
                </div>

                <p class="opacity-70">Прибытие</p>
                <div class="row mb-3">
                    <input class="col-5 m-auto border border-primary rounded py-2 fs-16px" type="time">
                    <p class="col-auto m-auto">-</p>
                    <input class="col-5 m-auto border border-primary rounded py-2 fs-16px" type="time">
                </div>
            </div>
        </div>
    </div>
    {{--/Filter card--}}
    <div class="container fs-16px text-primary">
        <a><i class="fas fa-times"></i> Сбросить фильтр</a>
    </div>
</div>
{{--/FILTER--}}
