<?php
// app/Services/SetOrderDataService.php
namespace App\Services;

use App\Models\Passenger;
use Illuminate\Support\Facades\Http;

class UserDataService
{
    public function define_passengers_array($amount, $type)
    {
        if($amount != 0) {
            if(auth()->user() != null) {
                $array=Passenger::query()->where('user_id','=',auth()->user()->id)->where('type','=',$type)->limit($amount-1)->get();

                if ($type=='взрослый') {
                    $array[] = [
                        'surname'       => auth()->user()->surname,
                        'name'          => auth()->user()->name,
                        'date_of_birth' => auth()->user()->date_of_birth,
                        'sex'           => auth()->user()->sex,
                        'citizenship'   => auth()->user()->citizenship,
                        'doc_type'      => auth()->user()->doc_type,
                        'serial_number' => auth()->user()->serial_number,
                        'validity'      => auth()->user()->validity,
                        'type'          => auth()->user()->type,
                    ];
                }

                for ($i=$array->count(); $i<$amount; $i++) {
                    $array[] = [
                        'surname'       => null,
                        'name'          => null,
                        'date_of_birth' => null,
                        'sex'           => null,
                        'citizenship'   => null,
                        'doc_type'      => null,
                        'serial_number' => null,
                        'validity'      => null,
                        'type'          => null,
                    ];
                }
            } else {
                for ($i=0; $i<$amount; $i++) {
                    $array[] = [
                        'surname'       => null,
                        'name'          => null,
                        'date_of_birth' => null,
                        'sex'           => null,
                        'citizenship'   => null,
                        'doc_type'      => null,
                        'serial_number' => null,
                        'validity'      => null,
                        'type'          => null,
                    ];
                }
            }
        } else {
            $array = [];
        }

        return $array;
    }

}
