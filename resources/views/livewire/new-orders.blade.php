<div>
    <a href="{{route('admin.orders.index')}}" class="menu-link">
        <div class="menu-icon">
            <i class="fas fa-envelope"></i>
        </div>
        <div class="menu-text">Заявки</div>
        @if($orders_cnt>0)
        <div class="menu-badge">{{$orders_cnt}}</div>
        @endif
    </a>
</div>

