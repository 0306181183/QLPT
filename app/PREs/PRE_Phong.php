<?php


namespace App\PREs;

use App\DAOs\DAO_Hopdong;
use App\Mes as MES;
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


        if ($this->dao_phong->count_HD($params->idphong)!=0)
        {
            $dto_hopdong=$this->dao_hopdong->form($this->dao_phong->get_HD($params->idphong));
            $songuoihientai=$this->dao_phong->get_KhachTro($dto_hopdong->getId());
           $songuoimax=$params->songuoimax;
           if($songuoihientai<$songuoimax)
               return ['result' => false, 'message' => null];
           else
               return ['result' => true, 'message' => MES::$suaphong_fail];
        }
        return ['result' => false, 'message' => null];


    }



    public function dong_phong($params): array
    {
        if ($this->dao_phong->count_HD($params->idphong)!=0)
            return ['result' => True, 'message' => MES::$dongphong_fail];
        return ['result' => false, 'message' => null];


    }


}
