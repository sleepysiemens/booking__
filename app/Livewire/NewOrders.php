<?php

namespace App\Livewire;

use App\Models\Order;
use Illuminate\View\View;
use Livewire\Component;

class NewOrders extends Component
{
    public function render(): View
    {
        $orders = Order::all();
        $orders_cnt = $orders->where('wasRecentlyCreated', '=', true)->count();

        return view('livewire.new-orders', compact(['orders_cnt']));
    }
}
