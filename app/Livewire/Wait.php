<?php

namespace App\Livewire;

use Livewire\Component;

class Wait extends Component
{
    public function placeholder()
    {
        return view('livewire.wait_2_stage');
    }

    public function render()
    {
        sleep(5);
        return view('livewire.wait_3_stage');
    }
}
