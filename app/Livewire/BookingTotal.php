<?php

namespace App\Livewire;

use App\Models\Promocode;
use Livewire\Component;

class BookingTotal extends Component
{
    public $total_rub;
    public $total_eur;
    public $cookie;
    public $saled=false;
    public function mount($cookie)
    {
        $this->cookie=$cookie;
        $this->total_eur=$cookie->booking_price_eur;
        $this->total_rub=$cookie->booking_price_rub;
    }

    public function promocode($code)
    {
        if(Promocode::query()->where('title','=',$code)->exists())
        {
            $promocode=Promocode::query()->where('title','=',$code)->first();

            $this->total_rub=$this->total_rub-$this->total_rub*$promocode->percent/100;
            $this->total_eur=$this->total_eur-$this->total_eur*$promocode->percent/100;
            $this->saled=true;
        }
        else
        {
            $this->total_rub=$this->cookie->booking_price_rub;
            $this->total_eur=$this->cookie->booking_price_eur;
            $this->saled=false;
        }
    }

    public function render()
    {
        return view('livewire.booking-total');
    }
}
