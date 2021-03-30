<?php


namespace App\DAOs;




use App\DTOs\DTO_Giadichvu;

class DAO_Giadichvu
{
    public function add(DTO_Giadichvu $dto_giadv)
    {
        app('db')->table('giadichvu')->insert([
            'id' => $dto_giadv->getId(),
            'idloai' => $dto_giadv->getIdloai(),
            'giathaydoi' => $dto_giadv->getGiathaydoi(),
            'ngaythaydoi' => $dto_giadv->getNgaythaydoi(),
        ]);
    }




}
