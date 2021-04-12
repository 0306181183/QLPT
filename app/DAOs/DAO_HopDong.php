<?php


namespace App\DAOs;




use App\DTOs\DTO_Hopdong;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DAO_Hopdong
{
    public function add(DTO_HopDong $dto_hopdong)
    {
        app('db')->table('hopdong')->insert([
            'id'=>(string)Str::uuid(),
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

//    public function soSanhSoDien( string $id, int $soDien):bool
//    {
//
//    }

    public function soSanhSoNguoi( string $id, int $songuoi):bool
    {
        $soNguoi=DB::table('trangthaithue')->where('id', $id)->value('songuoi');
        if($songuoi>1)
            return true;
        else
            return false;
    }











}
