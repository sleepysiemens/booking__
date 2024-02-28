@extends('Layouts.wrapper')

@section('content')
    @include('blocks.welcome')

    <div class="section bg-light p-3">
        <br>
    </div>

    <div class="section bg-light pt-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card shadow border-0">
                        <div class="card-body">
                            <div class="row justify-content-center mt-2">
                                <div class="col-auto">
                                    <h1 class="text-center mb-3">{{__('Ожидание билета')}}</h1>
                                    <p class="text-center">{{__('Поздравляем! Вы забронировали билет.')}}</p>
                                </div>
                            </div>

                            @if($order->is_confirmed)
                                @include('livewire.wait_3_stage')
                            @else
                                <livewire:wait2 :order="$order" lazy/>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @if(!$order->is_confirmed)
        <script>
            console.log('test');
            setTimeout(function(){
                console.log('hello');
                location.reload();
            }, 890000);
        </script>
    @endif
@endsection
