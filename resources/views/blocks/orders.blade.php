<div class="col-lg-9 col-12 sec" id="orders">
    <h4 class="fw-500 mb-3">Заказы</h4>
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
                    <h2 class="text-center">Заказов пока нет</h2>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p class="text-center">У вас нет купленных бронирований, перейдите на главную для поиска билета</p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <a class="btn btn-primary d-flex w-200px h-50px m-auto" href="{{asset(route('main.index'))}}">
                        <p class="m-auto fw-500">На главную</p>
                    </a>
                </div>
            </div>
        </div>
    @endif
</div>