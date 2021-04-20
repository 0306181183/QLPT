<?php


namespace App\PREs;

use Messages as MES;
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
        if ($this->dao_khach->ktTonTaiTrongHD($params->id)!=null)
            return ['result' => True, 'message' => MES::$xoakhach_fail];
        return ['result' => false, 'message' => Null];
    }








}
