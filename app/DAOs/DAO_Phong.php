<?php


namespace App\DAOs;

use App\DTOs\DTO_Phong;

class DAO_Phong
{
    public function add(DTO_Phong $dto_phong)
    {
        app('db')->table('phong')->insert([
            'id' => $dto_phong->getId(),
            'tenphong' => $dto_phong->getTenphong(),
            'songuoimax' => $dto_phong->getSonguoimax(),
            'giaphong' => $dto_phong->getGiaphong(),
            'trangthai' => $dto_phong->getTrangthai(),

        ]);
    }

    public function modify_info(DTO_Phong $dto_phong)
    {
        app('db')->table('phong')->where('id', $dto_phong->getId())->update([
            'tenphong' => $dto_phong->getTenphong(),
            'songuoimax'=>$dto_phong->getSonguoimax(),

        ]);
    }

    public function modify_price(DTO_Phong $dto_phong)
    {
        app('db')->table('phong')->where('id', $dto_phong->getId())->update([
            'giaphong' => $dto_phong->getGiaphong(),
        ]);
    }

    public function modify_close(DTO_Phong $dto_phong)
    {
        app('db')->table('phong')->where('id', $dto_phong->getId())->update([
            'trangthai' => $dto_phong->getTrangthai(),
        ]);
    }

    public function modify_open(DTO_Phong $dto_phong)
    {
        app('db')->table('phong')->where('id', $dto_phong->getId())->update([
            'trangthai' => $dto_phong->getTrangthai(),
        ]);
    }



}
