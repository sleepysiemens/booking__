<?php

namespace App\Livewire;

use App\Services\FlightSearchService;
use Livewire\Component;

class SearchRes extends Component
{
    public $request;

    public $transfer;
    public $airlines=[];

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

        $results=collect($results);

        if($this->airlines!=null)
        {
            $cnt=0;
            foreach ($this->airlines as $airline)
            {
                $cnt++;
                $results_[$cnt]=$results->where('airline', '=', $airline);
            }

            $results=[];

            foreach ($results_ as $result_)
            {
                foreach ($result_ as $result)
                {
                    $results[]=$result;
                }
            }
        }

        return view('livewire.search-results', compact(['results', 'request', 'airlines_filter']));
    }
}
