<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;

class Wait extends Component
{
    public function placeholder()
    {
        return view('livewire.wait_2_stage');
    }

    public function render()
    {
        $order_id=Order::query()->where('user_id', '=', auth()->user()->id)->latest()->first();
        //dd($order_id);
        sleep(5);
        return view('livewire.wait_3_stage', compact(['order_id']));
    }
}
