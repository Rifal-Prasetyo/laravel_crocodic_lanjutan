<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Validator as FacadesValidator;

class Validator
{
    public static function validate($column)
    {
        $validator = FacadesValidator::make($column, ([
            'title'  => 'required|min:5',
            'content' => 'required'
        ]));
        if ($validator->fails()) {
            return $validator->errors()->first();
        }

        return false; // data benar
    }
}
