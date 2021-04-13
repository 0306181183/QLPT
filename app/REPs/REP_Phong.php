<?php
namespace App\REPs;

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
    public function __construct(DAO_Phong $dao_phong,DAO_Log $dao_log)
    {
        $this->dao_phong=$dao_phong;
        $this->dao_log=$dao_log;
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
            $dto_phong =new  DTO_Phong();
            $dto_phong->setId($request->idphong);
            $dto_phong->setTenphong($request->tenphong);
            $dto_phong->setSonguoimax($request->songuoimax);
            /*$dto_phong->setGiaphong($request->giaphong);*/
            $dto_phong->setTrangthai(true);
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
            $dto_phong =new  DTO_Phong();
            $dto_phong->setId($request->idphong);
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
            $dto_phong =new  DTO_Phong();
            $dto_phong->setId($request->idphong);
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
            $dto_phong =new  DTO_Phong();
            $dto_phong->setId($request->idphong);
            $dto_phong->setGiaphong($request->giaphong);
            $hopdong=$this->dao_phong->get_HD($request->idphong);
            if($hopdong->count()<1)
            {
                $this->dao_phong->modify($dto_phong);
            }
            else
            {
                $dto_log=new DTO_Log();
                $dto_log->setIdloai(1);
                $dto_log->setIdhopdong($hopdong->id);
                $dto_log->setNoidung([
                    'giaphong'=>$request->giaphong,
                    'idphong'=>$request->idphong
                ]);
                app('db')->transaction(
                    function () use ($dto_log,$dto_phong)
                    {
                        $this->dao_phong->modify($dto_phong);
                        $this->dao_log->add($dto_log);
                    }
                );

            }
        }catch (Exception $e)
        {
            return $e;
        }
        return false;
    }
}
