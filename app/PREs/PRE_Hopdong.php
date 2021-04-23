<?php


namespace App\PREs;


use App\DAOs\DAO_Hopdong;
use App\DAOs\DAO_Phong;
use App\Mes as MES;

class PRE_Hopdong
{
    private DAO_Hopdong $dao_hopdong;
    private DAO_Phong $dao_phong;

    public function __construct(DAO_Hopdong $dao_hopdong, DAO_Phong $dao_phong)
    {
        $this->$dao_hopdong = $dao_hopdong;
        $this->$dao_phong=$dao_phong;
    }


    public function themnguoi_HD($params): array
    {
            //Lấy ra idphong trong table hopdong
            $idphong=$this->dao_hopdong->form($this->dao_hopdong->dto_get($params->idphong))->getIdphong();
            //Lấy ra songuoimax trong table phong
            $songuoimax=$this->dao_phong->form($this->dao_phong->dto_get($idphong))->getSonguoimax();
            //Truy vấn số người hiện tại trong bảng khachtro
            $songuoihientai=$this->dao_phong->get_KhachTro($params->id);
            $kq=$songuoihientai+1;
            if($songuoimax>$kq)
                return ['result' => false, 'message' => Null];
            return ['result' => True, 'message' => MES::$themnguoivaoHD_fail];
    }

    public function xoanguoi_HD($params): array
    {
        $songuoihientai=$this->dao_phong->get_KhachTro($params->id);
        if ( $this->dao_phong->ktXoaNguoi($songuoihientai))
            return ['result' => false, 'message' => Null];
        return ['result' => True, 'message' => MES::$xoanguoikhoiHD_fail];
    }











}
