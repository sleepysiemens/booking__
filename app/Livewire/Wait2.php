<?php

namespace App\Livewire;

use App\Models\Order;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class Wait2 extends Component
{
    public $order;

    public function placeholder()
    {
        return view('livewire.wait_2_2_stage');
    }

    public function initializeItems($order)
    {
        $this->order = $order;
    }

    public function render()
    {
        if(Cache::has('ticket_view'))
        {
            $ticket_view=Cache::get('ticket_view');
        }
        else
        {
            Cache::put('ticket_view','all');
            $ticket_view='all';
        }
        //dd(json_decode($this->order->data)->user_data->user);
        sleep(90);

        $users=json_decode($this->order->data)->user_data->user;

        return view('livewire.wait_3_stage', compact(['ticket_view', 'users']));
    }
}
