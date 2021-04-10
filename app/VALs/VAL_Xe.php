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
                'idkhach' => 'required|uuid|unique|exist:khachtro,id',

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
                'id'=>'required|unique|uuid|exist:xe,id',
                'idhopdong'=>'required|uuid|unique|exist:hopdong,id',

            ]);
        } catch (ValidationException $e) {
            $error_messages = $e->errors();
            return (string)array_shift($error_messages)[0];
        }
        return false;
    }

}
