<?php


namespace App\DAOs;


use App\DTOs\DTO_Khachtro;


class DAO_Khachtro
{
    public function add(DTO_Khachtro $dto_khachtro)
    {
        app('db')->table('khachtro')->insert([
            'id'=>$dto_khachtro->getId(),
            'tenkhach' => $dto_khachtro->getTenkhach(),
            'cmnd' => $dto_khachtro->getCmnd(),
            'gioitinh' => $dto_khachtro->getGioitinh(),
            'ngaysinh' => $dto_khachtro->getNgaysinh(),
            'quequan' => $dto_khachtro->getQuequan(),
            'trangthai'=>true,

        ]);
    }

    public function modify_info(DTO_Khachtro $dto_khachtro)
    {
        app('db')->table('khachtro')->where('id', $dto_khachtro->getId())->update([
            'tenkhach' => $dto_khachtro->getId(),
            'cmnd' => $dto_khachtro->getCmnd(),
            'gioitinh' => $dto_khachtro->getGioitinh(),
            'ngaysinh' => $dto_khachtro->getNgaysinh(),
            'quequan' => $dto_khachtro->getQuequan(),
        ]);
    }

    public function modify_status(DTO_Khachtro $dto_khachtro)
    {
        app('db')->table('khachtro')->where('id', $dto_khachtro->getId())->update([
            'trangthai'=>$dto_khachtro->getTrangthai(),
        ]);
    }


}
