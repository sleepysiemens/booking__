<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;

class Wait2 extends Component
{
    public $order_id;

    public function placeholder()
    {
        return view('livewire.wait_2_2_stage');
    }

    public function initializeItems($order_id)
    {
        $this->request = $order_id;
    }

    public function render()
    {
        sleep(90);
        return view('livewire.wait_3_stage');
    }
}
