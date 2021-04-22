<?php


namespace App\VALs;


use Illuminate\Validation\ValidationException;
use Laravel\Lumen\Routing\ProvidesConvenienceMethods;

class VAL_Xe
{
    use ProvidesConvenienceMethods;

    public function them_xe($params)
    {
        try {
            $this->validate($params, [
                'loaixe' => 'required|string|max:20',
                'bienso' => 'required|string|min:7|max:10',
                'idkhach' => 'uuid|exists:khachtro,id',


            ]);
        } catch (ValidationException $e) {
            $error_messages = $e->errors();
            return (string)array_shift($error_messages)[0];
        }
        return false;
    }

    public function xoa_xe($params)
    {
        try {
            $this->validate($params, [
                'idxe'=>'required|uuid|exists:xe,id',
                'idhopdong'=>'uuid|exists:hopdong,id',

            ]);
        } catch (ValidationException $e) {
            $error_messages = $e->errors();
            return (string)array_shift($error_messages)[0];
        }
        return false;
    }

}
