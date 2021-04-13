<?php


namespace App\PREs;


use App\DAOs\DAO_Hopdong;
use App\DAOs\DAO_Phong;
use Messages as MES;

class PRE_Hopdong
{
    private DAO_Hopdong $dao_hopdong;
    private DAO_Phong $dao_phong;

    public function __construct(DAO_Hopdong $dao_hopdong, DAO_Phong $dao_phong)
    {
        $this->$dao_hopdong = $dao_hopdong;
        $this->$dao_phong=$dao_phong;
    }

    public function tao_hopdong($params): array
    {
        if ( $this->dao_phong->soSanhSoNguoi($params->id,$params->songuoi))
            return ['result' => false, 'message' => Null];
        return ['result' => True, 'message' => MES::$taohopdong_fail];
    }

    public function themnguoi_HD($params): array
    {
        if ( $this->dao_phong->soSanhSoNguoi($params->id,$params->songuoi))
            return ['result' => false, 'message' => Null];
        return ['result' => True, 'message' => MES::$themnguoivaoHD_fail];
    }

    public function xoanguoi_HD($params): array
    {
        if ( $this->dao_hopdong->soSanhSoNguoi($params->id,$params->songuoi))
            return ['result' => false, 'message' => Null];
        return ['result' => True, 'message' => MES::$xoanguoikhoiHD_fail];
    }











}
