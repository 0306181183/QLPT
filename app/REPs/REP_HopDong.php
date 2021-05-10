<?php
namespace App\REPs;

use App\DAOs\DAO_Giadichvu;
use App\DAOs\DAO_Hopdong;
use App\DAOs\DAO_Khachtro;
use App\DAOs\DAO_Log;
use App\DAOs\DAO_Phieuthu;
use App\DAOs\DAO_Phong;
use App\DAOs\DAO_TrangthaiThue;
use App\DAOs\DAO_Xe;
use App\DTOs\DTO_Hopdong;
use App\DTOs\DTO_Khachtro;
use App\DTOs\DTO_Log;
use App\DTOs\DTO_Phieuthu;
use App\DTOs\DTO_Trangthaithue;
use Carbon\Carbon;
use Carbon\Traits\Date;
use Exception;

class REP_HopDong
{
    private DAO_Hopdong $dao_hopdong;
    private DAO_Log $dao_log;
    private DAO_Phieuthu $dao_phieuthu;
    private DAO_TrangthaiThue $dao_trangthaithue;
    private DAO_Xe $dao_xe;
    private DAO_Phong $dao_phong;
    private DAO_Khachtro $dao_khachtro;
    private DAO_Giadichvu $dao_giadichvu;
    public function __construct(DAO_Giadichvu $dao_giadichvu,DAO_Khachtro $dao_khachtro,DAO_Phong $dao_phong,DAO_Xe $dao_xe,DAO_Log $dao_log,DAO_Hopdong $dao_hopdong,DAO_Phieuthu $dao_phieuthu,DAO_TrangthaiThue $dao_trangthaithue)
    {
        $this->dao_giadichvu=$dao_giadichvu;
        $this->dao_khachtro=$dao_khachtro;
        $this->dao_phong=$dao_phong;
        $this->dao_hopdong=$dao_hopdong;
        $this->dao_log=$dao_log;
        $this->dao_phieuthu=$dao_phieuthu;
        $this->dao_trangthaithue=$dao_trangthaithue;
        $this->dao_xe=$dao_xe;
    }
    public function tao_hopdong($request)
    {
        try {

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
                   $dto_trangthaithue->setWifi($request->wifi);
                   $dto_trangthaithue->setIdhopdong($dto_hopdong1->getId());
                   $songuoi=count($request->khach);
                   $soxe=0;
                   $dto_trangthaithue->setSonguoi($songuoi);

                    foreach ($request->khach as $khach)
                    {
                        $dto_log =new DTO_Log();
                        $dto_log->setIdloai(2);
                        $dto_log->setNoidung([
                            'idkhach'=>$khach['idkhach']
                        ]);
                        $dto_log->setIdhopdong($dto_hopdong1->getId());
                        $this->dao_log->add($dto_log);
                        $soluongxe=$this->dao_xe->get_idkhach($khach['idkhach']);

                        if($soluongxe>0)
                        {

                            for ($i=0;$i<$soluongxe;$i++)
                            {
                                $dto_log1 =new DTO_Log();
                                $dto_log1->setIdloai(4);
                                $dto_log1->setNoidung([
                                    'idkhach'=>$khach['idkhach']
                                ]);
                                $dto_log1->setIdhopdong($dto_hopdong1->getId());
                                $this->dao_log->add($dto_log1);
                                $soxe=$soxe+1;
                            }
                        }
                 //     $dto_trangthaithue->setSoxe($soxe);
//                        $giaphong=$this->dao_phong->form($this->dao_phong->dto_get($request->idphong))->getGiaphong();
//                        $dto_trangthaithue->setGiaphong($giaphong);
                    }
                    $dto_trangthaithue->setSoxe($soxe);
                    $giaphong=$this->dao_phong->form($this->dao_phong->dto_get($request->idphong))->getGiaphong();
                    $dto_trangthaithue->setGiaphong($giaphong);
                    $this->dao_trangthaithue->add($dto_trangthaithue);
                    //thêm log wifi,log chisodien, log giaphong

                    //giaphong
                    $dto_log2 =new DTO_Log();
                    $dto_log2->setIdloai(1);
                    $dto_log2->setNoidung([
                        'giaphong'=>$giaphong,
                        'idphong'=>$request->idphong
                    ]);
                    $dto_log2->setIdhopdong($dto_hopdong1->getId());
                    $this->dao_log->add($dto_log2);
                    //chisodien
                    $dto_log3 =new DTO_Log();
                    $dto_log3->setIdloai(6);
                    $dto_log3->setNoidung([
                        'chisodien'=>$request->chisodien
                    ]);
                    $dto_log3->setIdhopdong($dto_hopdong1->getId());
                    $this->dao_log->add($dto_log3);
                    //wifi
                    $dto_log4 =new DTO_Log();
                    $dto_log4->setIdloai(7);
                    $dto_log4->setNoidung([
                        'wifi'=>$request->wifi
                    ]);
                    $dto_log4->setIdhopdong($dto_hopdong1->getId());
                    $this->dao_log->add($dto_log4);
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

       /* $dto_hopdong=$this->dao_hopdong->form($this->dao_hopdong->dto_get($request->idhopdong));*/
        $dto_trangthaithue= new DTO_Trangthaithue();
        $time=Carbon::now();
        $noidung=$this->dao_log->form($this->dao_log->chisodien($request->idhopdong))->getNoidung();
        $dto_trangthaithue->setChisodien($noidung['chisodien']);
        $dto_trangthaithue->setIdhopdong($request->idhopdong);
        $dto_trangthaithue->setSoxe($this->dao_xe->soxe_HD($request->idhopdong));

        $dto_trangthaithue->setSonguoi($this->dao_phong->get_KhachTro($request->idhopdong));
        //pass

        $giaphong=$this->dao_log->form($this->dao_log->loggiatri($request->idhopdong,1))->getNoidung();
        $dto_trangthaithue->setGiaphong($giaphong['giaphong']);
        $wifi=$this->dao_log->form($this->dao_log->loggiatri($request->idhopdong,7))->getNoidung();
        $dto_trangthaithue->setWifi($wifi['wifi']);
        app('db')->transaction(
            function () use ($time, $dto_trangthaithue,$request)
            {
                $chisodientruoc=$this->dao_trangthaithue->form($this->dao_trangthaithue->get_TrangThaiThue($request->idhopdong))->getChisodien();
                $idtrangthai=$this->dao_trangthaithue->add($dto_trangthaithue);
                $dto_phieuthu= new DTO_Phieuthu();
                $dto_phieuthu->setIdtrangthaithue($idtrangthai);
                $dto_phieuthu->setGiaphong($dto_trangthaithue->getGiaphong());
                //pass
                $dto_phieuthu->setTienquanly($this->dao_giadichvu->form($this->dao_giadichvu->giadv(5))->getGiathaydoi());

                $dto_phieuthu->setTienrac($this->dao_giadichvu->form($this->dao_giadichvu->giadv(4))->getGiathaydoi());
                if($dto_trangthaithue->getWifi()==true)
                    $dto_phieuthu->setTienwifi($this->dao_giadichvu->form($this->dao_giadichvu->giadv(3))->getGiathaydoi());
                else
                    $dto_phieuthu->setTienwifi(0);
                $soky=$dto_trangthaithue->getChisodien()-$chisodientruoc;

                $dto_phieuthu->setTiendien($this->dao_giadichvu->form($this->dao_giadichvu->giadv(1))->getGiathaydoi()*$soky);
                $songuoi=$dto_trangthaithue->getSonguoi();
                $songuoi=$songuoi-$this->dao_log->slkhach($request->idhopdong,2)+$this->dao_log->slkhach($request->idhopdong,3);
                $dto_phieuthu->setTiennuoc($songuoi*$this->dao_giadichvu->form($this->dao_giadichvu->giadv(2))->getGiathaydoi());
                //pass
                $dto_phieuthu->setTienxe($this->tienxe($request->idhopdong,$dto_trangthaithue->getSoxe()));
                var_dump($dto_phieuthu);
                $this->dao_phieuthu->add($dto_phieuthu);

            });

    }
    public function tienxe(string $idhopdong,int $soxe)
    {
       $gia=$this->dao_giadichvu->form($this->dao_giadichvu->giadv(6))->getGiathaydoi();

       $thanhtien=0;
       $dsthemxe=$this->dao_log->dsxe($idhopdong,4);
        $dsxoaxe=$this->dao_log->dsxe($idhopdong,5);
        if($dsthemxe!=null)
        foreach ($dsthemxe as $xe)
        {
            $logxe=$this->dao_log->form($xe);
            $songay=30-Date::parse($logxe->getNgaylap())->day;
            $thanhtien=$thanhtien+($songay/30)*$gia;
            $soxe--;

        }

        if($dsxoaxe!=null)
        foreach ($dsxoaxe as $xe)
        {
            $logxe=$this->dao_log->form($xe);
            $songay=Date::parse($logxe->getNgaylap())->day;
            $thanhtien=$thanhtien+($songay/30)*$gia;
        }

        return $thanhtien+($soxe*$gia);

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

            $tmp=$this->dao_khachtro->dto_get($request->idkhach);
            $dto_khachtro=$this->dao_khachtro->form($tmp);
            $dto_khachtro->setIdhopdong($request->idhopdong);
            app('db')->transaction(
                function () use ($dto_khachtro,$request)
                {
                    $this->dao_khachtro->modify($dto_khachtro);
                    $dto_log1=new DTO_Log();
                    $dto_log1->setIdhopdong($request->idhopdong);
                    $dto_log1->setIdloai(2);
                    $dto_log1->setNoidung([
                        'idkhach'=>$dto_khachtro->getId()
                    ]);
                    $this->dao_log->add($dto_log1);
                    $soluongxe=$this->dao_xe->get_idkhach($dto_khachtro->getId());

                    if($soluongxe>0)
                    {
                        var_dump($soluongxe);
                        for ( $i=0;$i<$soluongxe;$i++)
                        {
                            $dto_log2=new DTO_Log();
                            $dto_log2->setIdhopdong($request->idhopdong);
                            $dto_log2->setNoidung([
                                'idkhach'=>$request->idkhach
                            ]);
                            $dto_log2->setIdloai(4);
                            $this->dao_log->add($dto_log2);
                        }
                    }

                });

        }catch (Exception $e)
        {
            return $e;
        }
        return false;
    }
    public function xoanguoi_HD($request)
    {
        try {
            $dto_khachtro=$this->dao_khachtro->form($this->dao_khachtro->dto_get($request->idkhach));
            $dto_khachtro->setIdhopdong(null);
            app('db')->transaction(
                function () use ($dto_khachtro,$request) {
                    $this->dao_khachtro->modify($dto_khachtro);
                    $dto_log1 = new DTO_Log();
                    $dto_log1->setIdloai(3);
                    $dto_log1->setNoidung([
                        'idkhach' => $request->idkhach,
                    ]);
                    $dto_log1->setIdhopdong($request->idhopdong);
                    $this->dao_log->add($dto_log1);
                    $soluongxe=$this->dao_xe->get_idkhach($dto_khachtro->getId());
                    if($soluongxe>0){
                        for($i=0;$i<$soluongxe;$i++){
                            $dto_log2 = new DTO_Log();
                            $dto_log2->setIdloai(5);
                            $dto_log2->setNoidung([
                                'idkhach' => $request->idkhach,
                            ]);
                            $dto_log2->setIdhopdong($request->idhopdong);
                            $this->dao_log->add($dto_log2);
                        }
                    }
                }

            );


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
