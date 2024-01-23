<?php
// app/Services/AirportService.php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class AirportService
{
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = '048a44328dd6efc65b762b8e8c20e30a';
    }

    public function getAllAirports()
    {

        $response = Http::get('https://api.travelpayouts.com/data/ru/airports.json', ['x-access-token:' => $this->apiKey]);
        $body = $response->body();

        $airportData = json_decode($body, true);

                $response = Http::get('https://api.travelpayouts.com/data/ru/cities.json', ['x-access-token:' => $this->apiKey]);
                $body = $response->body();

                $cityData = json_decode($body, true);

                $response = Http::get('https://api.travelpayouts.com/data/ru/countries.json', ['x-access-token:' => $this->apiKey]);
                $body = $response->body();

                $countryData = json_decode($body, true);

                $cnt=0;
                foreach ($airportData as $airport)
                {
                    //удалить жд вокзалы
                    if($airport['iata_type']!='airport')
                    {
                        //unset($airportData[$cnt]);
                        $i=1;
                    }
                    else
                    {
                        //изменяем название аэропорта на русское
                        if(isset($airport['name_translations']['ru']))
                        {
                            $airport_name=$airport['name_translations']['ru'];
                        }
                        else
                        {
                            $airport_name=$airport['name'];
                        }

                        //берем название города на русском
                        foreach ($cityData as $city)
                        {
                            if($city['code']==$airport['city_code'])
                            {
                                if(isset($city['name_translations']['ru']))
                                {
                                    $city_name=$city['name_translations']['ru'];
                                }
                                else
                                    $city_name=$city['name'];
                                break;
                            }
                        }

                        //берем название страны на русском
                        foreach ($countryData as $country)
                        {
                            if($country['code']==$airport['country_code'])
                            {
                                if(isset($country['name_translations']['ru']))
                                {
                                    $country_name=$country['name_translations']['ru'];
                                }
                                else
                                    $country_name=$country['name'];
                                break;
                            }
                        }
                        if($airport_name==null)
                            $airport_name=$city_name;

                        $airportData[$cnt]['name']=$airport_name;
                        $airportData[$cnt]['city_name']=$city_name;
                        $airportData[$cnt]['country_name']=$country_name;
                        $airportData[$cnt]['airport_code']=$airportData[$cnt]['code'];

                        $airportData[$cnt]['code']=
                            $airportData[$cnt]['name'].'/'.
                            $airport['code'].'/'.
                            $airportData[$cnt]['city_name'].'/'.
                            $airport['city_code'].'/'.
                            $airportData[$cnt]['country_name'].'/'.
                            $airport['country_code'].'/'
                        ;

                        $cnt++;
                    }
                }
        //dd($airportData);
        return $airportData;
    }
}
?>
