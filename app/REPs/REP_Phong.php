<?php
namespace App\REPs;

use App\DAOs\DAO_Hopdong;
use App\DAOs\DAO_Log;
use App\DAOs\DAO_Phong;
use App\DTOs\DTO_Log;
use App\DTOs\DTO_Phong;
use Exception;
use function Symfony\Component\Translation\t;

class REP_Phong
{


    private DAO_Phong $dao_phong;
    private DAO_Log $dao_log;
    private DAO_Hopdong $dao_hopdong;
    public function __construct(DAO_Phong $dao_phong,DAO_Log $dao_log,DAO_Hopdong $dao_hopdong)
    {
        $this->dao_phong=$dao_phong;
        $this->dao_log=$dao_log;
        $this->dao_hopdong=$dao_hopdong;
    }
    public function  tao_phong($request)
    {
        try {
            $dto_phong=new DTO_Phong();
            $dto_phong->setTenphong($request->tenphong);
            $dto_phong->setSonguoimax($request->songuoimax);
            $dto_phong->setGiaphong($request->giaphong);
            $this->dao_phong->add($dto_phong);
        }catch (Exception $e)
        {
            return $e;
        }
        return false;
    }
    public function sua_phong($request)
    {
        try {
            $tmp=$this->dao_phong->dto_get($request->idphong);
            $dto_phong=$this->dao_phong->form($tmp);
            $dto_phong->setTenphong($request->tenphong);
            $dto_phong->setSonguoimax($request->songuoimax);
            $this->dao_phong->modify($dto_phong);
        }catch (Exception $e)
        {

            return $e;
        }
        return false;
    }
    public function mo_phong($request)
    {
        try {
            $tmp=$this->dao_phong->dto_get($request->idphong);
            $dto_phong=$this->dao_phong->form($tmp);
            //
            $dto_phong->setTrangthai(true);
            $this->dao_phong->modify($dto_phong);
        }catch (Exception $e)
        {
            return $e;
        }
        return false;
    }
    public function dong_phong($request)
    {
        try {
            $tmp=$this->dao_phong->dto_get($request->idphong);
            $dto_phong=$this->dao_phong->form($tmp);
            //
            $dto_phong->setTrangthai(false);
            $this->dao_phong->modify($dto_phong);

        }catch (Exception $e)
        {
            return $e;
        }
        return false;
    }
    public function sua_giaphong($request) //chưa chắc chắn
    {
        try {

            $tmp =$this->dao_phong->dto_get($request->idphong);
            $dto_phong = $this->dao_phong->form($tmp);
            $dto_phong->setGiaphong($request->giaphong);
            if($this->dao_phong->count_HD($request->idphong)!=0)
            {
                $tam=$this->dao_phong->get_HD($dto_phong->getId());
                $hopdong=$this->dao_hopdong->form($tam);
                $dto_log=new DTO_Log();
                $dto_log->setIdloai(1);
                $dto_log->setIdhopdong($hopdong->getId());
                $dto_log->setNoidung([
                    'idphong'=>$dto_phong->getId(),
                    'giaphong'=>$dto_phong->getGiaphong(),
                ]);
                app('db')->transaction(
                    function () use ($dto_log,$dto_phong)
                    {
                        $this->dao_phong->modify($dto_phong);
                        $this->dao_log->add($dto_log);
                    }
                );
            }
            else
            {
                $this->dao_phong->modify($dto_phong);

            }
        }catch (Exception $e)
        {
            return $e;
        }
        return false;
    }

}
