<?php


namespace App\DAOs;




use App\DTOs\DTO_Phieuthu;

class DAO_Phieuthu
{
    public function add(DTO_Phieuthu $dto_phieuthu)
    {
        app('db')->table('phieuthu')->insert([
            'id' => $dto_phieuthu->getId(),
            'giaphong' => $dto_phieuthu->getGiaphong(),
            'tiendien' => $dto_phieuthu->getTiendien(),
            'tiennuoc' => $dto_phieuthu->getTiennuoc(),
            'tienwifi' => $dto_phieuthu->getTienwifi(),
            'tienxe'=> $dto_phieuthu->getTienxe(),
            'tienrac'=>$dto_phieuthu->getTienrac(),
            'tienquanly'=>$dto_phieuthu->getTienquanly(),
            'trangthai'=>true,
            'ngaylap'=>date('Y-m-d')
        ]);
    }
    public function modify_status(DTO_Phieuthu $dto_phieuthu)
    {
        app('db')->table('phieuthu')->where('id', $dto_phieuthu->getId())->update([
            'trangthai' => false,
        ]);
    }





}
