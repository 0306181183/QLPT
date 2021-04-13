<?php


namespace App\DAOs;

use App\DTOs\DTO_Phong;
use Illuminate\Support\Str;

class DAO_Phong
{
    public function add(DTO_Phong $dto_phong)
    {
        app('db')->table('phong')->insert([
            'id'=>(string)Str::uuid(),
            'tenphong' => $dto_phong->getTenphong(),
            'songuoi_max' => $dto_phong->getSonguoimax(),
            'giaphong' => $dto_phong->getGiaphong(),
            'trangthai' => true,

        ]);
    }

    public function modify(DTO_Phong $dto_phong)
    {
        app('db')->table('phong')->where('id', $dto_phong->getId())->update([
            'tenphong' => $dto_phong->getTenphong(),
            'giaphong' => $dto_phong->getGiaphong(),
            'songuoimax'=>$dto_phong->getSonguoimax(),
            'trangthai' => $dto_phong->getTrangthai(),
        ]);
    }

    public function dto_get(string $id)
    {
        return app('db')->table('phong')->where('id', $id)->first();
    }
    public function get_HD(string $idphong) //Kiểm tra xem phòng có hợp đồng hay không
    {
        return app('db')->table('hopdong')->where('idphong',$idphong)->fist();

    }

    public function isUpdatable(string $id): bool
    {
        $doesntExist = app('db')->table('hopdong')->where('idphong', $id)->doesntExist();
        return $doesntExist;
    }









}
