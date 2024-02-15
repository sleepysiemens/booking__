<?php

namespace App\Livewire;

use App\Models\Airports;
use App\Services\FlightSearchService;
use Livewire\Component;

class SearchRes extends Component
{
    public $request;

    public $transfer;
    public $airlines=[];

    public $depart_start_time_filter;
    public $depart_end_time_filter;
    public $arrival_start_time_filter;
    public $arrival_end_time_filter;
    public $reset_filter=0;

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

        if($request['origin_']!=null and $request['destination_']!=null)
        {
            $results = $flightSearchService->parseFlightInfo($request['origin_'], $request['destination_'], $request['departDate'], $request['returnDate'], $request['passengers']['adults'], $request['passengers']['children'], $request['passengers']['infants']);

            if ($this->transfer != null) {
                $transfers = $this->transfer;
                $results = collect($results);
                $results = $results->where('transfers_amount', '=', $transfers);
            }

            if ($this->reset_filter == 1) {
                $this->transfer = null;
                $this->airlines = [];
                $this->depart_start_time_filter = null;
                $this->depart_end_time_filter = null;
                $this->arrival_start_time_filter = null;
                $this->arrival_end_time_filter = null;
                $this->reset_filter = 0;
            }

            if ($this->airlines != null) {
                $results = collect($results);

                $cnt = 0;
                foreach ($this->airlines as $airline) {
                    $cnt++;
                    $results_[$cnt] = $results->where('airline', '=', $airline);
                }

                $results = [];

                foreach ($results_ as $result_) {
                    foreach ($result_ as $result) {
                        $results[] = $result;
                    }
                }
            }

            if ($this->depart_start_time_filter != null) {
                $results = collect($results);

                $i = 0;
                foreach ($results as $result) {
                    if ($result['depart_datetime'] <= strtotime($result['depart_date'] . $this->depart_start_time_filter)) {
                        unset($results[$i]);
                    }
                    $i++;
                }
            }

            if ($this->depart_end_time_filter != null) {
                $results = collect($results);

                $i = 0;
                foreach ($results as $result) {
                    if ($result['depart_datetime'] >= strtotime($result['depart_date'] . $this->depart_end_time_filter)) {
                        unset($results[$i]);
                    }
                    $i++;
                }
            }

            if ($this->arrival_start_time_filter != null) {
                $results = collect($results);

                $i = 0;
                foreach ($results as $result) {
                    if ($result['arrival_datetime'] <= strtotime($result['arrival_date'] . $this->arrival_start_time_filter)) {
                        unset($results[$i]);
                    }
                    $i++;
                }
            }

            if ($this->arrival_end_time_filter != null) {
                $results = collect($results);

                $i = 0;
                foreach ($results as $result) {
                    if ($result['arrival_datetime'] >= strtotime($result['arrival_date'] . $this->arrival_end_time_filter)) {
                        unset($results[$i]);
                    }
                    $i++;
                }
            }

            $airports_=Airports::all();

            $airlines_filter=$flightSearchService->FilterAirlines($results);
            $transfers_filters=$flightSearchService->FilterTransfers($results);

        }
        else
        {
            $results=[];
            $airports_=[];
            $airlines_filter=[];
            $transfers_filters=[];
        }
        return view('livewire.search-results', compact(['results', 'request', 'airlines_filter', 'transfers_filters', 'airports_']));
    }

}
