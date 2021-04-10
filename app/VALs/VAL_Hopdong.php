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
                'idphong ' => 'required|uuid|unique|uuid|exist:phong,id',
                'chisodien' => 'required|integer|between:0,100000',
                'idkhach'=>'required|uuid|unique|exists:khach,id',
                'idxe'=>'required|uuid|unique|exists:xe,id'

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
                'idhopdong'=> 'required|uuid|unique|exists:hopdong,id'

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
                'id'=>'required|uuid|unique|exists:hopdong,id',

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
                'id'=>'required|uuid|unique|exists:hopdong,id',

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
                'idphieuthu'=>'required|uuid|exist:trangthaithue,id',
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
                'idkhach'=>'required|uuid|unique|exist:khachtro,id',
                'idhopdong'=>'required|uuid|unique|exist:hopdong,id'
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
                'idkhach'=>'required|uuid|unique|exist:khachtro,id',
                'idhopdong'=>'required|uuid|unique|exist:hopdong,id'
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
                'idhopdong'=>'required|uuid|unique|exist:hopdong,id',
                'wifi'=>'required|boolean',
            ]);
        } catch (ValidationException $e) {
            $error_messages = $e->errors();
            return (string)array_shift($error_messages)[0];
        }
        return false;
    }







}
