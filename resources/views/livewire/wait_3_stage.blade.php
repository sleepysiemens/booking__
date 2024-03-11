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
                <p class="text-center fw-600 text-green fs-16px mt-2">{{__('Обработка заказа')}}</p>
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
                <p class="text-center fw-600  text-green fs-16px mt-2">{{__('Подготовка документов')}}</p>
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
                <p class="text-center fw-600 text-green fs-16px mt-2">{{__('Готово')}}</p>
            </div>
        </div>
    </div>

    <div class="row px-20px mt-4">
        <div class="col-12 p-0 bg-black m-auto opacity-10" style="height: 2px"></div>
    </div>

    @if($ticket_view=='all' or $ticket_view=='common')
        <div class="row mt-4 mb-3 h-lg-50px px-20px">
            <div class="col-lg-6 col-12">
                <a href="{{route('ticket.download', $order->number)}}" class="d-flex btn btn-primary w-100 h-50px">
                    <p class="m-auto fs-12px d-block d-sm-none">Скачать общий билет</p>
                    <p class="m-auto fs-16px d-none d-lg-block">Скачать общий билет</p>
                </a>
            </div>
            <div class="col-lg-6 col-12 mt-4 mt-lg-0">
                <a href="{{route('ticket.index', $order->number)}}" class="d-flex btn btn-white border-2 w-100 h-50px" target="_blank">
                    <p class="m-auto fs-12px d-block d-sm-none">Посмотреть общий билет</p>
                    <p class="m-auto fs-16px d-none d-lg-block">Посмотреть общий билет</p>
                </a>
            </div>
        </div>
    @endif

    @if($ticket_view=='all')
        <div class="row px-20px my-4">
            <hr class="col my-auto"></hr>
            <p class="col-auto my-auto">{{__('или')}}</p>
            <hr class="col my-auto"></hr>
        </div>
    @endif

    @if($ticket_view=='all' or $ticket_view=='personal')
        <div class="row mt-4 mb-3 px-20px">
            @foreach($users as $user)
                <div class="col-lg-6 col-12 mt-4">
                    <a href="{{route('ticket.user.download', [$order->number, $user->surname])}}" class="d-flex btn btn-primary w-100 h-50px">
                        <p class="m-auto fs-12px d-block d-sm-none">Скачать билет {{$user->surname}}</p>
                        <p class="m-auto fs-16px d-none d-lg-block">Скачать билет {{$user->surname}}</p>
                    </a>
                </div>
                <div class="col-lg-6 col-12 mt-4">
                    <a href="{{route('ticket.user.index', [$order->number, $user->surname])}}" class="d-flex btn btn-white border-2 w-100 h-50px" target="_blank">
                        <p class="m-auto fs-12px d-block d-sm-none">Посмотреть билет {{$user->surname}}</p>
                        <p class="m-auto fs-16px d-none d-lg-block">Посмотреть билет {{$user->surname}}</p>
                    </a>
                </div>
            @endforeach
        </div>
    @endif

</div>
