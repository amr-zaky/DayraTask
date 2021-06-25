<?php

namespace App\Helper;
use Illuminate\Support\Facades\Validator;

class ApiValidator
{
    public static function validate($rules){
        $validate = Validator::make(request()->all(), $rules);
        if ($validate->fails()) {
            return $validate->messages();
        }
    }



}
