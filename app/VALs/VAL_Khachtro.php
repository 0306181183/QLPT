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
                'CMND' => 'required|integer|unique|min:9|max:12',
                'ngaysinh ' => 'required|required|date_format:d/m/Y',
                'quequan' => 'required|string|max:100',
                'gioitinh'=>'required|boolean',
                'idhopdong'=>'nullable|uuid|exists:hopdong,idhopdong'

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
                'id'=>'required|uuid|unique|exists:khachtro,id',
                'CMND' => 'required|integer|unique|min:9|max:12',
                'ngaysinh ' => 'required|required|date_format:d/m/Y',
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
                'id'=>'required|uuid|unique|exists:khachtro,id',
            ]);
        } catch (ValidationException $e) {
            $error_messages = $e->errors();
            return (string)array_shift($error_messages)[0];
        }
        return false;
    }


}
