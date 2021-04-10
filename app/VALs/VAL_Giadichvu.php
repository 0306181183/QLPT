<?php


namespace App\VALs;


use Illuminate\Validation\ValidationException;
use Laravel\Lumen\Routing\ProvidesConvenienceMethods;

class VAL_Giadichvu
{
    use ProvidesConvenienceMethods;

    public function sua_giadv($params)
    {
        try {
            $this->validate($params, [
                'idloai' => 'required|integer|between:0,5',
                'giathaydoi' => 'required|integer|between:0,10000000',

            ]);
        } catch (ValidationException $e) {
            $error_messages = $e->errors();
            return (string)array_shift($error_messages)[0];
        }
        return false;
    }

}
