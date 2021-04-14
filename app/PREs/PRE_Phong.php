<?php


namespace App\PREs;

use Messages as MES;
use App\DAOs\DAO_Phong;

class PRE_Phong
{
    private DAO_Phong $dao_phong;

     public function __construct(DAO_Phong $dao_phong)
     {
         $this->dao_phong = $dao_phong;
     }

    public function sua_phong($params): array
    {
        if ($this->dao_phong->ktTonTaiTrongHD($params->id))
        {
           $songuoimax=$this->dao_phong->form($this->dao_phong->dto_get($params->id))->getSonguoimax();
           if($this->dao_phong->soSanhSoNguoi($songuoimax,$params->songuoi))
               return ['result' => false, 'message' => Null];
        }
        return ['result' => True, 'message' => MES::$suaphong_fail];
    }

//    public function sua_phong($params): array
//    {
//        if ($this->dao_phong->ktTonTaiTrongHD($params->id) && $this->dao_phong->soSanhSoNguoi($params->id,$params->songuoi))
//            return ['result' => false, 'message' => Null];
//        return ['result' => True, 'message' => MES::$suaphong_fail];
//    }

    public function dong_phong($params): array
    {
        if ($this->dao_phong->ktTonTaiTrongHD($params->id))
            return ['result' => false, 'message' => Null];
        return ['result' => True, 'message' => MES::$dongphong_fail];
    }


}
