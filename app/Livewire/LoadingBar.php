<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class LoadingBar extends Component
{
    public $complete=false;
    #[On('LoadingComplete')]
    public function complete_()
    {
        $this->complete=true;
    }

    public function render()
    {
        return view('livewire.loading-bar');
    }
}
