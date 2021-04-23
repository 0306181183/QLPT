<?php


namespace App\PREs;

use App\Mes as MES;
use App\DAOs\DAO_Khachtro;


class PRE_Khachtro
{
    private DAO_Khachtro $dao_khach;

     public function __construct(DAO_Khachtro $dao_khach)
     {
         $this->dao_khach = $dao_khach;
     }

    public function xoa_khach($params): array
    {
        if ($this->dao_khach->ktTonTaiTrongHD($params->idkhach)!=null)
            return ['result' => true, 'message' => MES::$xoakhach_fail];
        return ['result' => false, 'message' => null];
    }








}
