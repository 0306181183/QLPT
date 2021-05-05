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

    public function tao_hopdong($params): array
    {
        //Lấy songuoimax của 1 phòng thông qua idphong
        $songuoimax=$this->dao_phong->form($this->dao_phong->dto_get($params->idphong))->getSonguoimax();
        //Truy vấn số người hiện tại trong bảng khachtro
        $songuoithemmoi=count($params->khach);
        $kq=$songuoithemmoi;
        if($songuoimax>$kq)
            return ['result' => false, 'message' => Null];
        return ['result' => True, 'message' => MES::$themnguoivaoHD_fail];
    }

    public function themnguoi_HD($params): array
    {
            //Lấy ra idphong trong table hopdong
            $idphong=$this->dao_hopdong->form($this->dao_hopdong->dto_get($params->idhopdong))->getIdphong();
            //Lấy ra songuoimax trong table phong
            $songuoimax=$this->dao_phong->form($this->dao_phong->dto_get($idphong))->getSonguoimax();
            //Truy vấn số người hiện tại trong bảng trangthaithue
            $songuoihientai=$this->dao_phong->get_KhachTro($params->idhopdong);
            if($songuoimax>$songuoihientai)
                return ['result' => false, 'message' => Null];
            return ['result' => True, 'message' => MES::$themnguoivaoHD_fail];
    }

    public function xoanguoi_HD($params): array
    {
        $songuoihientai=$this->dao_phong->get_KhachTro($params->idhopdong);
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
