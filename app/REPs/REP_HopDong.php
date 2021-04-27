<?php
namespace App\REPs;

use App\DAOs\DAO_Hopdong;
use App\DAOs\DAO_Khachtro;
use App\DAOs\DAO_Log;
use App\DAOs\DAO_Phieuthu;
use App\DAOs\DAO_Phong;
use App\DAOs\DAO_TrangthaiThue;
use App\DAOs\DAO_Xe;
use App\DTOs\DTO_Hopdong;
use App\DTOs\DTO_Log;
use App\DTOs\DTO_Trangthaithue;
use Exception;

class REP_HopDong
{
    private DAO_Hopdong $dao_hopdong;
    private DAO_Log $dao_log;
    private DAO_Khachtro $dao_khachtro;
    private DAO_Phieuthu $dao_phieuthu;
    private DAO_TrangthaiThue $dao_trangthaithue;
    private DAO_Xe $dao_xe;
<<<<<<< HEAD
    private DAO_Phong $dao_phong;
    public function __construct(DAO_Phong $dao_phong,DAO_Xe $dao_xe,DAO_Log $dao_log,DAO_Khachtro $dao_khach,DAO_Hopdong $dao_hopdong,DAO_Phieuthu $dao_phieuthu,DAO_TrangthaiThue $dao_trangthaithue)
=======
    public function __construct(DAO_Xe $dao_xe,DAO_Log $dao_log,DAO_Khachtro $dao_khachtro,DAO_Hopdong $dao_hopdong,DAO_Phieuthu $dao_phieuthu,DAO_TrangthaiThue $dao_trangthaithue)
>>>>>>> 57683ec6be11198219f27e1d328578a50244c4c1
    {
        $this->dao_phong=$dao_phong;
        $this->dao_hopdong=$dao_hopdong;
        $this->dao_log=$dao_log;
<<<<<<< HEAD
        $this->dao_khachtro=$dao_khach;
=======
        $this->dao_khachtro=$dao_khachtro;
>>>>>>> 57683ec6be11198219f27e1d328578a50244c4c1
        $this->dao_phieuthu=$dao_phieuthu;
        $this->dao_trangthaithue=$dao_trangthaithue;
        $this->dao_xe=$dao_xe;
    }
    public function tao_hopdong($request) //chuahoanthanh
    {
        try {
            var_dump($request);
            $dto_hopdong=new DTO_Hopdong();
            $dto_hopdong->setThoihan($request->thoihan);
            $dto_hopdong->setTiencoc($request->tiencoc);
            $dto_hopdong->setIdphong($request->idphong);
            app('db')->transaction(
                function () use ($dto_hopdong,$request)
                {
                   $this->dao_hopdong->add($dto_hopdong);
                   $dto_hopdong1=$this->dao_hopdong->form($this->dao_hopdong->dto_idphong($dto_hopdong->getIdphong()));
                   $dto_trangthaithue=new DTO_Trangthaithue();
                   $dto_trangthaithue->setChisodien($request->chisodien);
                   $dto_trangthaithue->setIdhopdong($dto_hopdong1->getId());
                   $songuoi=$request->khach->count();
                   $soxe=0;
                   $dto_trangthaithue->setSonguoi($songuoi); //chưa làm
                    foreach ($request->khach as $khach)
                    {
                        $dto_log =new DTO_Log();
                        $dto_log->setIdloai(2);
                        $dto_log->setNoidung([
                            'idkhach'=>$khach->idkhach
                        ]);
                        $dto_log->setIdhopdong($dto_hopdong1->getId());
                        $this->dao_log->add($dto_log);
                        $xe=$this->dao_xe->get_idkhach($khach->idkhach);
                        if($xe!= '')
                        {
                            foreach ($xe as $item)
                            {
                                $dto_log1 =new DTO_Log();
                                $dto_log->setIdloai(4);
                                $dto_log->setNoidung([
                                    'idkhach'=>$khach->idkhach
                                ]);
                                $dto_log->setIdhopdong($dto_hopdong1->getId());
                                $this->dao_log->add($dto_log1);
                                $soxe=$soxe+1;
                            }
                        }
                        $dto_trangthaithue->setSoxe($soxe);
                        $phong=$this->dao_phong->dto_get($request->idphong);
                        $dto_trangthaithue->setGiaphong($phong->giaphong);
                    }
                    $dto_trangthaithue->setSoxe($soxe);
                    $phong=$this->dao_phong->dto_get($request->idphong);
                    $dto_trangthaithue->setGiaphong($phong->giaphong);
                    $this->dao_trangthaithue->add($dto_trangthaithue);
                }
            );
        }catch (Exception $e)
        {
            return $e;
        }
        return false;

    }
    public function ghi_dien($request)
    {
        try {
            $dto_log=new DTO_Log();
            $dto_log->setIdhopdong($request->idhopdong);
            $dto_log->setIdloai(6);
            $dto_log->setNoidung([
                'chisodien'=>$request->chisodien
            ]);

            $this->dao_log->add($dto_log);
        }catch (Exception $e)
        {
            return $e;
        }
       return false;
    }
    public function tao_phieuthu($request)//chuahoanthanh
    {

    }
    public  function  thanh_toan($request)
    {
        try {
            $this->dao_phieuthu->modify($request->idphieuthu);
        }catch (Exception $e)
        {
            return $e;
        }
        return false;
    }
    public function themnguoi_HD($request)
    {
        try {

        }catch (Exception $e)
        {
            return $e;
        }
        return false;
    }
    public function xoanguoi_HD($request)
    {
        try {

        }catch (Exception $e)
        {
            return $e;
        }
        return false;
    }
    public  function wifi($request)
    {
        try {
            $dto_log=new DTO_Log();
            $dto_log->setIdhopdong($request->idhopdong);
            $dto_log->setIdloai(7);
            $dto_log->setNoidung([
                'wifi'=>$request->wifi
            ]);
            $this->dao_log->add($dto_log);
        }catch (Exception $e)
        {
            return $e;
        }
        return false;
    }
}
