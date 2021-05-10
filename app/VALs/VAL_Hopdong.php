<?php


namespace App\VALs;


use Illuminate\Validation\ValidationException;
use Laravel\Lumen\Routing\ProvidesConvenienceMethods;

class VAL_Hopdong
{
    use ProvidesConvenienceMethods;

    public function tao_hopdong($params)
    {
        try {
            $this->validate($params, [
                'thoihan' => 'required|integer|between:3,12',
                'tiencoc' => 'required|integer|between:0,100000000',
                'idphong' => 'uuid|exists:phong,id',
                'chisodien' => 'required|integer|between:0,100000',
                'khach[idkhach]'=>'uuid|exists:khach,id',
            ]);
        } catch (ValidationException $e) {
            $error_messages = $e->errors();
            return (string)array_shift($error_messages)[0];
        }
        return false;
    }

    public function ghi_dien($params)
    {
        try {
            $this->validate($params, [
                'chisodien' => 'required|integer|between:0,100000',
                'idhopdong'=> 'uuid|exists:hopdong,id'

            ]);
        } catch (ValidationException $e) {
            $error_messages = $e->errors();
            return (string)array_shift($error_messages)[0];
        }
        return false;
    }

    public function xoa_hopdong($params)
    {
        try {
            $this->validate($params, [
                'id'=>'required|uuid|exists:hopdong,id',

            ]);
        } catch (ValidationException $e) {
            $error_messages = $e->errors();
            return (string)array_shift($error_messages)[0];
        }
        return false;
    }

    public function tao_phieuthu($params)
    {
        try {
            $this->validate($params, [
                'idhopdong'=>'uuid|exists:hopdong,id',

            ]);
        } catch (ValidationException $e) {
            $error_messages = $e->errors();
            return (string)array_shift($error_messages)[0];
        }
        return false;
    }

    public function thanh_toan($params)
    {
        try {
            $this->validate($params, [
                'idphieuthu'=>'required|uuid|exists:trangthaithue,id',
            ]);
        } catch (ValidationException $e) {
            $error_messages = $e->errors();
            return (string)array_shift($error_messages)[0];
        }
        return false;
    }

    public function themnguoi_HD($params)
    {
        try {
            $this->validate($params, [
                'idhopdong'=>'uuid|exists:hopdong,id',
                'idkhach'=>'uuid|exists:khachtro,id',
            ]);
        } catch (ValidationException $e) {
            $error_messages = $e->errors();
            return (string)array_shift($error_messages)[0];
        }
        return false;
    }

    public function xoanguoi_HD($params)
    {
        try {
            $this->validate($params, [
                'idhopdong'=>'required|uuid|exists:hopdong,id',
                'idkhach'=>'required|uuid|exists:khachtro,id',

            ]);
        } catch (ValidationException $e) {
            $error_messages = $e->errors();
            return (string)array_shift($error_messages)[0];
        }
        return false;
    }

    public function wifi($params)
    {
        try {
            $this->validate($params, [
                'idhopdong'=>'required|uuid|exists:hopdong,id',
                'wifi'=>'required|boolean',
            ]);
        } catch (ValidationException $e) {
            $error_messages = $e->errors();
            return (string)array_shift($error_messages)[0];
        }
        return false;
    }







}
