<?php
namespace App\REPs;

use App\DAOs\DAO_Khachtro;
use App\DAOs\DAO_Xe;
use App\DTOs\DTO_Khachtro;
use Exception;


class REP_Khachtro
{
    private DAO_Khachtro $dao_khachtro;
    private DAO_Xe $dao_xe;
    public function __construct(DAO_Khachtro $dao_khachtro,DAO_Xe $dao_xe)
    {
        $this->dao_khachtro=$dao_khachtro;
        $this->dao_xe=$dao_xe;
    }
    public function tao_khach($request)
    {
        try {
            $dto_khach=new DTO_Khachtro();
            $dto_khach->setTenkhach($request->tenkhach);
            $dto_khach->setCmnd($request->cmnd);
            $dto_khach->setNgaysinh($request->ngaysinh);
            $dto_khach->setQuequan($request->quequan);
            $dto_khach->setGioitinh($request->gioitinh);
            $dto_khach->setIdhopdong($request->idhopdong);
            $this->dao_khachtro->add($dto_khach);
        }catch (Exception $e)
        {
            return $e;
        }
       return false;
    }
    public function sua_khach($request)
    {
        try {
           $dto_khach=$this->dao_khachtro->form($this->dao_khachtro->dto_get($request->idkhach));
            $dto_khach->setTenkhach($request->tenkhach);
            $dto_khach->setCmnd($request->cmnd);
            $dto_khach->setNgaysinh($request->ngaysinh);
            $dto_khach->setQuequan($request->quequan);
            $dto_khach->setGioitinh($request->gioitinh);
            $this->dao_khachtro->modify($dto_khach);
        }catch (Exception $e)
        {
            return $e;
        }
        return false;
    }
    public function xoa_khach($request)
    {
        try {
            $dto_khach=$this->dao_khachtro->form($this->dao_khachtro->dto_get($request->idkhach));
            $dto_khach->setTrangthai(false);
            app('db')->transaction(
                function () use ($dto_khach)
                {
                    $this->dao_khachtro->modify($dto_khach);
                    $this->dao_xe->remove_idkhach($dto_khach->getId());
                }
            );

        }catch (Exception $e)
        {
            return $e;
        }
        return false;
    }

}
