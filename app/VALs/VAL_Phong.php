<?php


namespace App\VALs;


use Illuminate\Validation\ValidationException;
use Laravel\Lumen\Routing\ProvidesConvenienceMethods;

class VAL_Phong
{
    use ProvidesConvenienceMethods;

    public function tao_phong($params)
    {
        try {
            $this->validate($params, [
                'tenphong' => 'required|string|max:20',
                'songuoimax' => 'required|integer|between:0,10',
                'giaphong' => 'required|integer:between:0,100000000',

            ]);
        } catch (ValidationException $e) {
            $error_messages = $e->errors();
            return (string)array_shift($error_messages)[0];
        }
        return false;
    }

    public function sua_phong($params)
    {
        try {
            $this->validate($params, [
                'id'=>'uuid|unique|exists:phong,id',
                'tenphong' => 'required|string|max:20',
                'songuoimax' => 'required|integer|between:0,10',
            ]);
        } catch (ValidationException $e) {
            $error_messages = $e->errors();
            return (string)array_shift($error_messages)[0];
        }
        return false;
    }

    public function sua_giaphong($params)
    {
        try {
            $this->validate($params, [
                'giaphong' => 'required|integer:between:0,100000000',

            ]);
        } catch (ValidationException $e) {
            $error_messages = $e->errors();
            return (string)array_shift($error_messages)[0];
        }
        return false;
    }


}
