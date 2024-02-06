<?php

namespace App\Livewire;

use App\Services\AirportService;
use App\Services\FlightSearchService;
use Livewire\Component;

class SearchResults extends Component
{
    public $request;
    public function initializeItems($request)
    {
        $this->request = $request;
    }

    public function placeholder()
    {
        return view('livewire.loading');
    }

    public function render(FlightSearchService $flightSearchService)
    {
        $request=$this->request;
        $this->flightSearchService = $flightSearchService;

        $results = $this->flightSearchService->parseFlightInfo($request['origin_'], $request['destination_'], $request['departDate']);
        $airlines_filter=$this->flightSearchService->FilterAirlines($results);

        return view('livewire.search-results', compact(['results', 'request', 'airlines_filter']));
    }
}
