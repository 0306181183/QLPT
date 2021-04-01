<?php


namespace App\DAOs;




use App\DTOs\DTO_Hopdong;

class DAO_Hopdong
{
    public function add(DTO_HopDong $dto_hopdong)
    {
        app('db')->table('hopdong')->insert([
            'id' => $dto_hopdong->getId(),
            'ngaylap' => date('Y-m-d'),
            'thoihan' => $dto_hopdong->getThoihan(),
            'tiencoc' => $dto_hopdong->getTiencoc(),
            'trangthai' => true
        ]);
    }
    public function modify_status(DTO_HopDong $dto_hopdong)
    {
        app('db')->table('hopdong')->where('id', $dto_hopdong->getId())->update([
            'trangthai' => false
        ]);

    }





}
