<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;

class Wait extends Component
{
    public function placeholder()
    {
        return view('livewire.wait_1_stage');
    }

    public function render()
    {
        $order=Order::query()->where('user_id', '=', auth()->user()->id)->latest()->first();
        $order=$order->number;
        sleep(3);

        return view('livewire.wait_2_stage', compact(['order']));
    }
}
