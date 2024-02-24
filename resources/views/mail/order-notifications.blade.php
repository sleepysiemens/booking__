<x-mail::message>
Заказ #{{$order}} подтвержден. <br>
    <a href="{{route('ticket.index',$order)}}">Посмотреть билет</a>
    <a href="{{route('ticket.download',$order)}}">Скачать билет</a>
</x-mail::message>
