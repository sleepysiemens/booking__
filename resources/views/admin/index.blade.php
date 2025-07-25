@extends('Layouts.admin')

@section('content')
    <h1 class="page-header">Dashboard <small></small></h1>

    <div class="row">
        <div class="col-xl-3 col-md-6 position-relative">
            <form method="post" action="{{route('admin.save_price')}}" class="widget widget-stats bg-blue">
                @csrf
                @method('patch')
                <div class="stats-icon"><i class="fas fa-tag"></i></div>
                <div class="stats-info">
                    <h4 class="text-uppercase">стоимость бронирования</h4>
                    <div class="row mt-4">
                        <div class="col-xxxl-4 col-6 d-flex">
                            <input type="number" class="w-75 fs-24px text-white fw-600" value="{{$price->regular_price_rub}}" name="regular_price_rub" required/>
                            <p>₽</p>
                        </div>
                        <h4 class="col-xxxl-2 col-12 my-auto mx-2">или</h4>
                        <div class="col-xxxl-4 col-6 d-flex">
                            <input type="number" class="w-75 fs-24px text-white fw-600" value="{{$price->regular_price_eur}}" name="regular_price_eur" required/>
                            <p>€</p>
                        </div>
                    </div>
                </div>
                <div class="stats-link pb-5">
                </div>
                <button class="btn bg-blue-700 text-blue-100 position-absolute bottom-0 w-100" style="left: 0">Сохранить <i class="fa fa-arrow-alt-circle-right"></i></button>
            </form>
        </div>
        <div class="col-xl-3 col-md-6">
            <form method="post" action="{{route('admin.save_ticket')}}" class="widget widget-stats bg-green">
                @csrf
                <div class="stats-icon"><i class="fas fa-tag"></i>
                </div>
                <div class="stats-info pb-4">
                    <h4 class="text-uppercase">отображение билетов</h4>
                    <div class="row mt-4">
                        <div class="form-check d-flex mb-3">
                            <input type="radio" class="my-auto" name="ticket_view" value="common" @if($ticket_view=='common') checked @endif/>
                            <label class="my-auto ms-2 fs-16px">Только общий билет</label>
                        </div>
                        <div class="form-check d-flex mb-3">
                            <input type="radio" class="my-auto" name="ticket_view" value="personal" @if($ticket_view=='personal') checked @endif/>
                            <label class="my-auto ms-2 fs-16px">Только персональные билеты</label>
                        </div>
                        <div class="form-check d-flex mb-3">
                            <input type="radio" class="my-auto" name="ticket_view" value="all" @if($ticket_view=='all') checked @endif/>
                            <label class="my-auto ms-2 fs-16px">Общий и индивидуальные билеты</label>
                        </div>
                    </div>
                </div>
                <button class="btn bg-green-700 text-blue-100 position-absolute bottom-0 w-100" style="left: 0">Сохранить <i class="fa fa-arrow-alt-circle-right"></i></button>

            </form>
        </div>
    </div>
@endsection
