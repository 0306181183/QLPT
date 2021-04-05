<?php


namespace App\DAOs;




use App\DTOs\DTO_Phieuthu;
use Illuminate\Support\Str;

class DAO_Phieuthu
{
    public function add(DTO_Phieuthu $dto_phieuthu)
    {
        app('db')->table('phieuthu')->insert([
            'id'=>(string)Str::uuid(),
            'giaphong' => $dto_phieuthu->getGiaphong(),
            'tiendien' => $dto_phieuthu->getTiendien(),
            'tiennuoc' => $dto_phieuthu->getTiennuoc(),
            'tienwifi' => $dto_phieuthu->getTienwifi(),
            'tienxe'=> $dto_phieuthu->getTienxe(),
            'tienrac'=>$dto_phieuthu->getTienrac(),
            'tienquan_ly'=>$dto_phieuthu->getTienquanly(),
            'tranhthai'=>true,
            'ngaylap'=>date('Y-m-d')
        ]);
    }
    public function modify(DTO_Phieuthu $dto_phieuthu)
    {
        app('db')->table('phieuthu')->where('id', $dto_phieuthu->getId())->update([
            'trangthai' => false,
        ]);
    }


    public function dto_get(string $id)
    {
        return app('db')->table('phieuthu')->where('id', $id)->first();
    }





}
