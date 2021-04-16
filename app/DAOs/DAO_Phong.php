<?php


namespace App\DAOs;

use App\DTOs\DTO_Phong;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DAO_Phong
{
    public function add(DTO_Phong $dto_phong)
    {
        app('db')->table('phong')->insert([
            'id'=>(string)Str::uuid(),
            'tenphong' => $dto_phong->getTenphong(),
            'songuoimax' => $dto_phong->getSonguoimax(),
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
    public function form($rc):DTO_Phong
    {
        $tmp=new DTO_Phong();
        $tmp->setId($rc->id);
        $tmp->setSonguoimax($rc->songuoimax);
        $tmp->setGiaphong($rc->giaphong);
        $tmp->setTrangthai($rc->trangthai);
        $tmp->setTenphong($rc->tenphong);
        return $tmp;
    }
    public function dto_get(string $id)
    {
        return app('db')->table('phong')->where('id', $id)->first();
    }


    public function get_HD(string $idphong) //Kiểm tra xem phòng có hợp đồng hay không
    {
        return app('db')->table('hopdong')->where('idphong',$idphong)->orWhere('trangthai',true)->first();

    }

    public function get_KhachTro(string $idhopdong): bool //Lấy số lượng khách trong 1 hợp đồng của 1 phòng
    {
        return app('db')->table('khachtro')->where('idhopdong', $idhopdong)->count();
    }

    public function soSanhSoNguoi( int $songuoimax, int $input):bool
    {
        return $input<$songuoimax;
    }

    public function ktXoaNguoi(int $input):bool
    {
        return $input<1;
    }













}
