@extends('Layouts.wrapper')

@section('content')
    @include('blocks.welcome')

    <div class="section bg-light">
        <div class="container">
            <div class="card border-0 shadow">
                <div class="card-body px-5">
                    @csrf
                    <div class="row mt-3">
                        <h2 class="text-center">{{__('Оплата заказа')}}</h2>
                    </div>
{{--
                    <link href="https://api.cryptocloud.plus/static/widget/v2/css/app.css"
                          rel="stylesheet">

                    <vue-widget shop_id="{{$API['ShopID']}}" api_key="{{$API['API_Key']}}"
                                currency="{{$API['currency']}}" amount="{{$API['price']}}"></vue-widget>

                    <script src="https://api.cryptocloud.plus/static/widget/v2/js/app.js"></script>--}}
                    <div class="row my-5 py-4">
                        <link href="https://api.cryptocloud.plus/static/pay_btn/css/app.css" rel="stylesheet" >
                        <vue-widget shop_id="{{$API['ShopID']}}" api_key="{{$API['API_Key']}}" background="#fff" color="#000" border_color="#000" logo="color" width="350px" currency="{{$API['currency']}}" amount="{{$API['price']}}" text_btn="Pay with CryptoCloud" order_id="{{$request['_token']}}" ></vue-widget>
                        <script src="https://api.cryptocloud.plus/static/pay_btn/js/app.js" ></script >
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
