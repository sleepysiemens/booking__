<div class="col-lg-9 col-12 sec" id="passengers">
    <div class="row">
        <div class="col d-flex">
            <h4 class="fw-500 my-auto">{{__('Пассажиры')}}</h4>
        </div>
        <div class="col justify-content-end d-flex">
            <button class="btn btn-primary d-flex h-50px">
                <p class="m-auto fw-500">{{__('Добавить пассажира')}}</p>
            </button>
        </div>
    </div>
    @if(isset($i))
        @foreach($i as $ii)
            <div class="card border-0 shadow mb-4">
                <div class="card-body">
                </div>
            </div>
        @endforeach
    @else
        <div class="section h-100">
            <div class="row">
                <div class="col">
                    <h2 class="text-center">{{__('Пассажиров пока нет')}}</h2>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p class="text-center">{{__('Создайте пассажиров, чтобы быстро добавлять их в бронирования')}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <a class="btn btn-primary d-flex w-200px h-50px m-auto" href="{{asset(route('main.index'))}}">
                        <p class="m-auto fw-500">{{__('На главную')}}</p>
                    </a>
                </div>
            </div>
        </div>
    @endif
</div>
