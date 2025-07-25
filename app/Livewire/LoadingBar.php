<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class LoadingBar extends Component
{
    public bool $complete = false;
    #[On('LoadingComplete')]
    public function complete_(): void
    {
        $this->complete = true;
    }

    public function render(): View
    {
        return view('livewire.loading-bar');
    }
}
