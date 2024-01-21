<?php

namespace App\Services;

class OldSeachService
{
    /* < Ссылка на API flight_search > */
    public $api_search_id = "http://api.travelpayouts.com/v1/flight_search";

    /* < Ссылка на API flight_search_results > */
    public $api_search_res = "http://api.travelpayouts.com/v1/flight_search_results";

    /* < Токен из личного кабинета travelpayouts > */
    public $token = "048a44328dd6efc65b762b8e8c20e30a";
    //public $token = "e733dadeb55ebdfed29dadce51a55956";

    /* < Маркер из личного кабинета travelpayouts > */
    public $marker = "36076";
    //public $marker = "330615";

    /* < Домен проекта. Нужен для работы с travelpayouts API > */
    public $domain = "tripavia.com";


/*================================================================================================*/

    function random_string($length, $chars = 'abdefhiknrstyzABDEFGHKNQRSTYZ1234567890')
    {
        $numChars = strlen($chars);
        $string = '';
        for($i = 0; $i < $length; $i++) $string .= substr($chars, rand(1, $numChars) - 1, 1);
        return $string;
    }

    function get_ip()
    {
        return($_SERVER['REMOTE_ADDR']);
    }

    function send($type, $data)
    {
        echo json_encode([ $type => $data ]);
        return;
    }

    function signatureQuery($options)
    {
        $result = [];

        foreach ($options as $key => $value)
        {
            if (!is_array($value)) $result[$key] = $value;
            else                   $result[$key] = implode(':', $this->signatureQuery($value));
        }

        ksort($result);
        return $result;
    }

    function getSignature($token, $query)
    {
        $merge = array_merge([$token], $this->signatureQuery($query));
        return md5(implode(':', $merge));
    }

    public function get_search_link()
    {
        $timezone  = 'America/Los_Angeles';
        $departure = 'LED';
        $arrival   = 'MOW';
        $start     = strtotime('2024-02-02');
        $end       = 0;
        $adults    = 1;
        $children  = 0;
        $infants   = 0;
        $tripClass = 'Y';
        /*
        if (!is_array($departure) || empty($departure) || count($departure) !== 2 || trim($departure[0]) === '' || trim($departure[1]) === '') return send('error', 'Поле "Откуда" обязательно для заполнения');
        if (!is_array($arrival) || empty($arrival) || count($arrival) !== 2 || trim($arrival[0]) === '' || trim($arrival[1]) === '') return $this->send('error', 'Поле "Куда" обязательно для заполнения');
        if ($departure[0] == $arrival[0]) return send('error', 'Города не могут совпадать');
        date_default_timezone_set($timezone);
        $time = strtotime(date('d-m-Y'));
        if (!is_numeric($start) || $start == 0 || $start < $time) return $this->send('error', 'Поле "Туда" обязательно для заполнения');
        if ($end != 0 && (!is_numeric($end) || $end < $start)) return $this->send('error', 'Поле "Обратно" заполнено неверно6');
        if (!is_numeric($adults) || !is_numeric($children) || !is_numeric($infants) || $adults < 1 || $adults < $infants || $children < 0 || $infants < 0 || ($adults + $children + $infants) > 9) return $this->send('error', 'Поле "Пассажиры, класс" заполнено неверно5');
        if ($tripClass !== 'Y' && $tripClass !== 'C') return $this->send('error', 'Поле "Пассажиры, класс" заполнено неверно');*/
        /*< --------------------- >*/
        $query = [
            'marker'     => $this->marker,
            'host'       => $this->domain,
            'user_ip'    => $this->get_ip(),
            'locale'     => 'ru',
            'trip_class' => $tripClass,
            'passengers' => [
                'adults'   => $adults,
                'children' => $children,
                'infants'  => $infants
            ],
            'segments' => [
                [
                    'origin'      => $departure[1],
                    'destination' => $arrival[1],
                    'date'        => date('Y-m-d', $start)
                ]
            ]
        ];

        if ($end != 0)
        {
            $query['segments'][] = [
                'origin'      => $arrival[1],
                'destination' => $departure[1],
                'date'        => date('Y-m-d', $end)
            ];
        }


        $query['signature'] = $this->getSignature($this->token, $query);

        return($query);

        $result = json_decode(file_get_contents($this->api_search_id, false, stream_context_create([
            'http' => [
                'method'  => 'POST',
                'header'  => 'Content-type: Content-type:application/json',
                'content' => json_encode($query, JSON_UNESCAPED_UNICODE)
            ]
        ])));

        $cookies = array(
            'uniq_code' => $this->random_string(16),
            'search_id' => $result->search_id
        );

        setcookie('data', json_encode($cookies), time() + 900, '/');

        return $this->send('success', [ 'cookies' => $cookies ]);
    }


    public function get_flights($search_id)
    {
        /*< --------------------- >*/
        $info = file_get_contents("{$this->api_search_res}?uuid={$search_id}");
        if ($info === false) $info = '[]';

        setcookie('data', '', time() - 1, '/');

        return $this->send('success', [ 'info' => $info ]);
    }
}
