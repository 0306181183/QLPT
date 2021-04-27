<?php


namespace App\PREs;


use App\DAOs\DAO_Hopdong;
use App\DAOs\DAO_Phong;
use App\DAOs\DAO_TrangthaiThue;
use App\Mes as MES;

class PRE_Hopdong
{
    private DAO_Hopdong $dao_hopdong;
    private DAO_Phong $dao_phong;
    private DAO_TrangthaiThue $dao_trangthaithue;

    public function __construct(DAO_Hopdong $dao_hopdong, DAO_Phong $dao_phong, DAO_TrangthaiThue $dao_trangthaithue)
    {
        $this->dao_hopdong = $dao_hopdong;
        $this->dao_phong=$dao_phong;
        $this->dao_trangthaithue=$dao_trangthaithue;
    }


    public function themnguoi_HD($params): array
    {
            //Lấy ra idphong trong table hopdong
            $idphong=$this->dao_hopdong->form($this->dao_hopdong->dto_get($params->idphong))->getIdphong();
            //Lấy ra songuoimax trong table phong
            $songuoimax=$this->dao_phong->form($this->dao_phong->dto_get($idphong))->getSonguoimax();
            //Truy vấn số người hiện tại trong bảng khachtro
            $songuoihientai=$this->dao_phong->get_KhachTro($params->idphong);
            $kq=$songuoihientai+1;
            if($songuoimax>$kq)
                return ['result' => false, 'message' => Null];
            return ['result' => True, 'message' => MES::$themnguoivaoHD_fail];
    }

    public function xoanguoi_HD($params): array
    {
        $songuoihientai=$this->dao_phong->get_KhachTro($params->idkhach);
        if ( $songuoihientai>1)
            return ['result' => false, 'message' => Null];
        return ['result' => True, 'message' => MES::$xoanguoikhoiHD_fail];
    }

    public function ghi_dien($params): array
    {
        $sodien=$this->dao_trangthaithue->form($this->dao_trangthaithue->get_TrangThaiThue($params->idhopdong))->getChisodien();
        if($sodien<$params->chisodien)
            return ['result' => false, 'message' => Null];
        return ['result' => True, 'message' => MES::$ghidien_fail];

    }










}
