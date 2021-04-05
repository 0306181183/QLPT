<?php


namespace App\DAOs;




use App\DTOs\DTO_Giadichvu;
use Illuminate\Support\Str;

class DAO_Giadichvu
{
    public function add(DTO_Giadichvu $dto_giadv)
    {
        app('db')->table('giadichvu')->insert([
            'id'=>(string)Str::uuid(),
            'idloai' => $dto_giadv->getIdloai(),
            'giathaydoi' => $dto_giadv->getNgaythaydoi(),
            'ngaythaydoi' => date('Y-m-d'),
        ]);
    }

    public function dto_get(string $id)
    {
        return app('db')->table('giadichvu')->where('id', $id)->first();
    }




}
