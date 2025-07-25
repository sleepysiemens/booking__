<?php

namespace App\Livewire;

use App\Models\Order;
use Illuminate\View\View;
use Livewire\Component;

class Wait extends Component
{
    public function placeholder(): View
    {
        return view('livewire.wait_1_stage');
    }

    public function render(): View
    {
        $order = Order::query()->where('user_id', '=', auth()->user()->id)->latest()->first();
        $order = $order->number;
        sleep(3);

        return view('livewire.wait_2_stage', compact(['order']));
    }
}
