<?php


namespace App\DAOs;


use App\DTOs\DTO_Khachtro;
use Carbon\Traits\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;


class DAO_Khachtro
{
    public function add(DTO_Khachtro $dto_khachtro)
    {
        app('db')->table('khachtro')->insert([
            'id'=>(string)Str::uuid(),
            'tenkhach' => $dto_khachtro->getTenkhach(),
            'cmnd' => $dto_khachtro->getCmnd(),
            'gioitinh' => $dto_khachtro->getGioitinh(),
            'ngaysinh' => $dto_khachtro->getNgaysinh(),
            'quequan' => $dto_khachtro->getQuequan(),
            'trangthai'=>true,

        ]);
    }

    public function modify(DTO_Khachtro $dto_khachtro)
    {
        app('db')->table('khachtro')->where('id', $dto_khachtro->getId())->update([
            'tenkhach' => $dto_khachtro->getTenkhach(),
            'cmnd' => $dto_khachtro->getCmnd(),
            'gioitinh' => $dto_khachtro->getGioitinh(),
            'ngaysinh' => $dto_khachtro->getNgaysinh(),
            'quequan' => $dto_khachtro->getQuequan(),
            'idhopdong'=>$dto_khachtro->getIdhopdong(),
            'trangthai'=>$dto_khachtro->getTrangthai(),
        ]);
    }

    public function dto_get(string $id)
    {
        return app('db')->table('khachtro')->where('id', $id)->first();
    }

    public function form($rc):DTO_Khachtro
    {
        $tmp=new DTO_Khachtro();
        $tmp->setId($rc->id);
        $tmp->setTenkhach($rc->tenkhach);
        $tmp->setCmnd($rc->cmnd);
        $tmp->setGioitinh($rc->gioitinh);
        $tmp->setNgaysinh($rc->ngaysinh);
        $tmp->setQuequan($rc->quequan);
        $tmp->setIdhopdong($rc->idhopdong);
        $tmp->setTrangthai($rc->trangthai);
        return $tmp;
    }

    public function ktTonTaiTrongHD(string $id)
    {
        return app('db')->table('khachtro')->where('id', $id)->value('idhopdong');
    }




}
