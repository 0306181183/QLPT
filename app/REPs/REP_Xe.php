<?php
namespace App\REPs;

use App\DAOs\DAO_Khachtro;
use App\DAOs\DAO_Log;
use App\DAOs\DAO_Xe;
use App\DTOs\DTO_Log;
use App\DTOs\DTO_Xe;
use Exception;

class REP_Xe
{
    private DAO_Xe $dao_xe;
    private DAO_Log $dao_log;
    private DAO_Khachtro $dao_khach;
    public function __construct(DAO_Xe $dao_xe,DAO_Log $dao_log,DAO_Khachtro $dao_khach)
    {
        $this->dao_xe=$dao_xe;
        $this->dao_log=$dao_log;
        $this->dao_khach=$dao_khach;
    }
    public function them_xe($request)
    {
        try {
            $dto_xe=new DTO_Xe();
            $dto_xe->setIdkhach($request->idkhach);
            $dto_xe->setBienso($request->bienso);
            $dto_xe->setLoaixe($request->loaixe);
            $dto_khach=$this->dao_khach->form($this->dao_khach->dto_get($request->idkhach));
            if(!$dto_khach->getIdhopdong())
            {
                $this->dao_xe->add($dto_xe);
            }
            else
            {
                $dto_log=new DTO_Log();
                $dto_log->setIdloai(4);
                $dto_log->setIdhopdong($dto_khach->getIdhopdong());
                $dto_log->setNoidung([
                    'idkhach'=>$dto_khach->getId()
                ]);
                app('db')->transaction(
                    function () use ($dto_log,$dto_xe)
                    {
                        $this->dao_xe->add($dto_xe);
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
    public function xoa_xe($request)
    {
        try {
            $dto_xe=$this->dao_xe->form($this->dao_xe->dto_get($request->idxe));
            $dto_khach=$this->dao_khach->form($this->dao_khach->dto_get($dto_xe->getIdkhach()));

            if(!$dto_khach->getIdhopdong())
            {
                $this->dao_xe->remove($dto_xe->getId());
            }
            else
            {
                $dto_log=new DTO_Log();
                $dto_log->setIdloai(5);
                $dto_log->setIdhopdong($dto_khach->getIdhopdong());
                $dto_log->setNoidung([
                    'idkhach'=>$dto_khach->getId()
                ]);
                app('db')->transaction(
                    function () use ($dto_log,$dto_xe)
                    {
                        $this->dao_xe->remove($dto_xe->getId());
                        $this->dao_log->add($dto_log);
                    }
                );
            }
        } catch (Exception $e)
        {
            return $e;
        }
        return false;
    }
}
