<?php
// app/Services/AirportService.php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use App\Models\Airports;

class AirportService
{
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = '048a44328dd6efc65b762b8e8c20e30a';
    }

    public function get_ru_name($arr)
    {
        if(isset($arr['name_translations']['ru']))
        {
            return $arr['name_translations']['ru'];
        }
        else
            return $arr['name'];
    }

    public function getAllAirports()
    {
        // Проверяем, есть ли кэш для этого массива
        return Cache::remember('airports_array', now()->addYear(), function () {
            // Если кэша нет, создаем массив и кэшируем его
            foreach (Airports::all() as $airport)
            {
                $airport->delete();
            }
            return $this->generateAllAirports();
        });

    }

    public function translit($string, $lang)
    {
        $result = '';
        $length = mb_strlen($string, 'utf-8');
        for ($i = 0; $i < $length; $i++)
        {
            $char = mb_substr($string, $i, 1, 'utf-8');
            if($lang=='ru')
                $char = $this->translit_replace_ru($char);
            elseif ($lang=='en')
                $char = $this->translit_replace_en($char);
            $result .= $char;
        }
        return $result;
    }

    public function translit_replace_ru($key)
    {
        switch ($key)
        {
            case 'Q':
            case  'q':
                $key='й';
                break;

            case 'W':
            case  'w':
                $key='ц';
                break;

            case  'E':
            case  'e':
                $key='у';
                break;

            case  'R':
            case  'r':
                $key='к';
                break;

            case  'T':
            case  't':
                $key='е';
                break;

            case  'Y':
            case  'y':
                $key='н';
                break;

            case  'U':
            case  'u':
                $key='г';
                break;

            case  'I':
            case  'i':
                $key='ш';
                break;

            case  'O':
            case  'o':
                $key='щ';
                break;

            case  'P':
            case  'p':
                $key='з';
                break;

            case  '{':
            case  '[':
                $key='х';
                break;

            case  '}':
            case  ']':
                $key='ъ';
                break;
//
            case  'A':
            case  'a':
                $key='ф';
                break;

            case  'S':
            case  's':
                $key='ы';
                break;

            case  'D':
            case  'd':
                $key='в';
                break;

            case  'F':
            case  'f':
                $key='а';
                break;

            case  'G':
            case  'g':
                $key='п';
                break;

            case  'H':
            case  'h':
                $key='р';
                break;

            case  'J':
            case  'j':
                $key='о';
                break;

            case  'K':
            case  'k':
                $key='л';
                break;

            case  'L':
            case  'l':
                $key='д';
                break;

            case  ':':
            case  ';':
                $key='ж';
                break;

            case  '"':
            case  '\'':
                $key='э';
                break;
                //
            case  'Z':
            case  'z':
                $key='я';
                break;

            case  'X':
            case  'x':
                $key='ч';
                break;

            case  'C':
            case  'c':
                $key='с';
                break;

            case  'V':
            case  'v':
                $key='м';
                break;

            case  'B':
            case  'b':
                $key='и';
                break;

            case  'N':
            case  'n':
                $key='т';
                break;

            case  'M':
            case  'm':
                $key='ь';
                break;

            case  '<':
            case  ',':
                $key='б';
                break;

            case  '>':
            case  '.':
                $key='ю';
                break;

            case  '?':
            case  '/':
                $key='.';
                break;
        }
        return $key;
    }

    public function translit_replace_en($key)
    {
        switch ($key)
        {
            case 'Й':
            case  'й':
                $key='q';
                break;

            case  'Ц':
            case  'ц':
                $key='w';
                break;

            case  'У':
            case  'у':
                $key='e';
                break;

            case  'К':
            case  'к':
                $key='r';
                break;

            case  'Е':
            case  'е':
                $key='t';
                break;

            case  'Н':
            case  'н':
                $key='y';
                break;

            case  'Г':
            case  'г':
                $key='u';
                break;

            case  'Ш':
            case  'ш':
                $key='i';
                break;

            case  'Щ':
            case  'щ':
                $key='o';
                break;

            case  'З':
            case  'з':
                $key='p';
                break;

            case  'Х':
            case  'х':
                $key='[';
                break;

            case  'Ъ':
            case  'ъ':
                $key=']';
                break;
//
            case  'Ф':
            case  'ф':
                $key='a';
                break;

            case  'Ы':
            case  'ы':
                $key='s';
                break;

            case  'В':
            case  'в':
                $key='d';
                break;

            case  'А':
            case  'а':
                $key='f';
                break;

            case  'П':
            case  'п':
                $key='g';
                break;

            case  'Р':
            case  'р':
                $key='h';
                break;

            case  'О':
            case  'о':
                $key='j';
                break;

            case  'Л':
            case  'л':
                $key='k';
                break;

            case  'Д':
            case  'д':
                $key='l';
                break;

            case  'Ж':
            case  'ж':
                $key=';';
                break;

            case  'Э':
            case  'э':
                $key='\'';
                break;
            //
            case  'Я':
            case  'я':
                $key='z';
                break;

            case  'Ч':
            case  'ч':
                $key='x';
                break;

            case  'С':
            case  'с':
                $key='c';
                break;

            case  'М':
            case  'м':
                $key='v';
                break;

            case  'И':
            case  'и':
                $key='b';
                break;

            case  'Т':
            case  'т':
                $key='n';
                break;

            case  'Ь':
            case  'ь':
                $key='m';
                break;

            case  'Б':
            case  'б':
                $key=',';
                break;

            case  'Ю':
            case  'ю':
                $key='.';
                break;

            case  '.':
            case  ',':
                $key='/';
                break;
        }
        return $key;
    }

    public function generateAllAirports()
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

        $result=[];


        foreach ($countryData as $country)
        {
            $country_name=$this->get_ru_name($country);

            foreach ($cityData as $city)
            {
                if($city['country_code']==$country['code'])
                {
                    $city_name=$this->get_ru_name($city);

                    $data=
                        [
                            'country_name'=>$country_name,
                            'country_name_en'=>$country['name_translations']['en'],
                            'city_name'=>$city_name,
                            'city_name_en'=>$city['name_translations']['en'],
                            'name'=>$city_name,
                            'iata_type'=>'city',
                            'code'=>
                                '/'.$city['code'].'/'.
                                //$this->translit($city['code'], 'en').'/'.

                                //$this->translit($country['name_translations']['en'], 'ru').'/'.
                                $country['name_translations']['en'].'/'.
                                $country_name.'/'.
                                //$this->translit($country_name, 'en').'/'.
                                $country['code'].'/'.
                                //$this->translit($country['code'], 'en').'/'.
                                //$this->translit($city['name_translations']['en'], 'ru').'/'.
                                $city['name_translations']['en'].'/'.
                                $city_name.'/'//.
                                //$this->translit($city_name, 'en')
                                ,
                            'city_code'=>$city['code'],
                            'airport_code'=>$city['code'],
                        ];

                    $result[]= $data;
                    Airports::create($data);

                    foreach ($airportData as $airport)
                    {
                        if($airport['city_code']==$city['code'] and $airport['iata_type']=='airport')
                        {
                            $airport_name=$this->get_ru_name($airport);
                            $data=
                                [
                                    'country_name'=>$country_name,
                                    'country_name_en'=>$country['name_translations']['en'],
                                    'city_name'=>$city_name,
                                    'city_name_en'=>$city['name_translations']['en'],
                                    'city_code'=>$city['code'],
                                    'name'=>$airport_name,
                                    'airport_code'=>$airport['code'],
                                    'iata_type'=>'airport',
                                    'code'=>
                                        $city['code'].'/'.
                                        //$this->translit($city['code'],'en').'/'.
                                        $airport['code'].'/'.
                                        //$this->translit($airport['code'],'en').'/'.
                                        //$country['name_translations']['en'].'/'.
                                        //$this->translit($country['name_translations']['en'],'ru').'/'.
                                        //$country_name.'/'.
                                        //$this->translit($country_name, 'en').'/'.
                                        //$country['code'].'/'.
                                        //$this->translit($country['code'],'en').'/'.
                                        //$city['name_translations']['en'].'/'.
                                        //$this->translit($city['name_translations']['en'], 'ru').'/'.
                                        $city_name.'/'.
                                        //$this->translit($city_name,'en').'/'.
                                        $airport_name.'/'.
                                        //$this->translit($airport_name,'en').'/'.
                                        $airport['name_translations']['en'].'/'//.
                                        //$this->translit($airport['name_translations']['en'], 'ru'),
                                ];

                            $result[]= $data;
                            Airports::create($data);
                        }
                    }
                }
            }
        }

        return $result;
    }
}
?>
