{{--<div class="w-100 d-flex position-relative" style="height: 50vh;">
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
--}}

<div class="row loading-page">
    <div class="col-lg-3 col ps-lg-0 d-lg-block mb-3">
        @for($i=1; $i<=3;$i++)
            <div class="card border-0 shadow mb-3">
                <div class="card-body">
                    <div class="bg-gray-300 w-100px h-15px rounded-pill mb-3"></div>
                    <div class="bg-gray-300 w-150px h-15px rounded-pill mb-3"></div>
                    <div class="bg-gray-300 w-150px h-15px rounded-pill mb-3"></div>
                </div>
            </div>
        @endfor
    </div>

    <div class="col-lg-9 pe-lg-0">
        @for($i=1; $i<=5; $i++)
            <div class="card border-0 shadow mb-3">
                <div class="card-body pb-lg-3 pb-5">
                    <div class="row">
                        <div class="col-lg">

                            <div class="d-flex">
                                <div class="bg-gray-300 w-100px h-25px rounded-pill"></div>
                            </div>


                            <div style="display: block;" id="ticket-body-1">
                                <div class="row row-cols-lg-4 mt-3">
                                    <div class="col">
                                        <div class="container">
                                            <div class="bg-gray-300 w-100px h-15px rounded-pill mb-3"></div>
                                            <div class="bg-gray-300 w-50px h-30px rounded-pill mb-3"></div>
                                            <div class="bg-gray-300 w-100px h-15px rounded-pill"></div>
                                        </div>
                                    </div>
                                    <div class="col d-flex opacity-25">
                                        <div class="bg-black w-100 my-auto position-relative" style="height: 2px">
                                            <div class="position-absolute bg-white m-auto rounded-circle border-2 border-black border" style="width: 10px; height: 10px; left: 0; right: 0; top: 0; bottom: 0"></div>
                                        </div>
                                        <i class="fas fa-caret-right my-auto" aria-hidden="true"></i>
                                    </div>
                                    <div class="col">
                                        <div class="container">
                                            <div class="bg-gray-300 w-100px h-15px rounded-pill mb-3"></div>
                                            <div class="bg-gray-300 w-50px h-30px rounded-pill mb-3"></div>
                                            <div class="bg-gray-300 w-100px h-15px rounded-pill"></div>
                                        </div>
                                    </div>
                                    <div class="col d-none d-lg-block">
                                        <div class="container">
                                            <div class="bg-gray-300 w-100px h-15px rounded-pill mb-3"></div>
                                            <div class="bg-gray-300 w-100px h-15px rounded-pill mb-3"></div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="col-1 p-0 bg-black opacity-20 d-none d-lg-block" style="width: 1px;"></div>
                        <div class="bg-black opacity-20 d-block d-lg-none w-100 mb-3" style="height: 1px;"></div>

                        <div class="col-lg-3">
                            <div class="container h-100">
                                <div class="h-100 d-flex d-lg-block justify-content-between">
                                    <div class="d-lg-none">
                                        <div class="bg-gray-300 w-100px h-15px rounded-pill"></div>
                                        <div class="bg-gray-300 w-100px h-15px rounded-pill"></div>
                                    </div>
                                    <div class="row my-auto">
                                        <div class="bg-gray-300 w-100px h-25px rounded-pill"></div>
                                    </div>
                                    <div class="row mt-lg-5 d-flex position-relative">
                                        <div class="btn-primary btn fs-12px h-55px m-auto w-200px"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        @endfor
    </div>
</div>
