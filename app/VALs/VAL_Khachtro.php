<?php


namespace App\VALs;


use Illuminate\Validation\ValidationException;
use Laravel\Lumen\Routing\ProvidesConvenienceMethods;

class VAL_Khachtro
{
    use ProvidesConvenienceMethods;

    public function tao_khach($params)
    {
        try {
            $this->validate($params, [
                'tenkhach' => 'required|string|max:100',
                'cmnd' => 'required|string|min:9|max:13',
                'ngaysinh' => 'required|date_format:Y-m-d',
                'quequan' => 'required|string|max:100',
                'gioitinh'=>'required|boolean',
            ]);
        } catch (ValidationException $e) {
            $error_messages = $e->errors();
            return (string)array_shift($error_messages)[0];
        }
        return false;
    }

    public function sua_khach($params)
    {
        try {
            $this->validate($params, [
                'idkhach'=>'required|uuid|exists:khachtro,id',
                'cmnd' => 'required|string|unique|min:9|max:12',
                'ngaysinh' => 'required|date_format:Y-m-d',
                'quequan' => 'required|string|max:100',
                'gioitinh'=>'required|boolean',
            ]);
        } catch (ValidationException $e) {
            $error_messages = $e->errors();
            return (string)array_shift($error_messages)[0];
        }
        return false;
    }


    public function xoa_khach($params)
    {
        try {
            $this->validate($params, [
                'idkhach'=>'uuid|exists:khachtro,id',
            ]);
        } catch (ValidationException $e) {
            $error_messages = $e->errors();
            return (string)array_shift($error_messages)[0];
        }
        return false;
    }


}
