<?php


namespace App\DAOs;


use App\DTOs\DTO_Khachtro;
use Illuminate\Support\Str;


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
            'trangthai'=>$dto_khachtro->getTrangthai(),
        ]);
    }

    public function dto_get(string $id)
    {
        return app('db')->table('khachtro')->where('id', $id)->first();
    }



}
