<?php


namespace App\PREs;

use App\DAOs\DAO_Hopdong;
use Messages as MES;
use App\DAOs\DAO_Phong;

class PRE_Phong
{
    private DAO_Phong $dao_phong;

     public function __construct(DAO_Phong $dao_phong, DAO_Hopdong $dao_hopdong)
     {
         $this->dao_phong = $dao_phong;
         $this->dao_hopdong=$dao_hopdong;
     }

    public function sua_phong($params): array
    {
        $get_HD=$this->dao_phong->get_HD($params->id);
        if ($get_HD)
        {
            $idhopdong=$this->dao_hopdong->form($get_HD)->getId();
            $songuoihientai=$this->dao_phong->get_KhachTro($idhopdong);
           $songuoimax=$this->dao_phong->form($this->dao_phong->dto_get($params->id))->getSonguoimax();
           if($this->dao_phong->soSanhSoNguoi($songuoimax,$songuoihientai))
               return ['result' => false, 'message' => Null];
        }
        return ['result' => True, 'message' => MES::$suaphong_fail];
    }


    public function dong_phong($params): array
    {
        if ($this->dao_phong->get_HD($params->id))
            return ['result' => false, 'message' => Null];
        return ['result' => True, 'message' => MES::$dongphong_fail];
    }


}
