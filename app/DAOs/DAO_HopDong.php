<?php


namespace App\DAOs;




use App\DTOs\DTO_Hopdong;
use Illuminate\Support\Str;

class DAO_Hopdong
{
    public function add(DTO_HopDong $dto_hopdong)
    {
        app('db')->table('hopdong')->insert([
<<<<<<< HEAD
            'id' => (string)Str::uuid(),
=======
            'id'=>(string)Str::uuid(),
>>>>>>> 79114fe6c92f07564bcbded6ab6116751ca7e701
            'ngaylap' => date('Y-m-d'),
            'thoihan' => $dto_hopdong->getThoihan(),
            'tiencoc' => $dto_hopdong->getTiencoc(),
            'trangthai' => true
        ]);
    }
    public function modify(DTO_HopDong $dto_hopdong)
    {
        app('db')->table('hopdong')->where('id', $dto_hopdong->getId())->update([
            'trangthai' => false
        ]);

    }

    public function dto_get(string $id)
    {
        return app('db')->table('hopdong')->where('id', $id)->first();
    }







}
