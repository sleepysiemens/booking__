@extends('Layouts.wrapper')

@section('content')
    @include('blocks.welcome')
    <div class="section bg-light p-3">
        <div class="container">
            <p class="opacity-70 text-black text-decoration-underline">
                <a class="text-black" href="{{route('main.index')}}">{{__('Главная')}}</a>
                /
                <a class="text-black" href="{{route('blog.index', 1)}}">{{__('Блог')}}</a>
            </p>
        </div>
    </div>

    <div class="section bg-light pt-4">
        <livewire:blog />
    </div>
@endsection

@section('scripts')

@endsection
