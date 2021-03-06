<?php


namespace App\DAOs;




use App\DTOs\DTO_Giadichvu;
use App\DTOs\DTO_Hopdong;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DAO_Hopdong
{
    public function add(DTO_HopDong $dto_hopdong)
    {
        app('db')->table('hopdong')->insert([
            'id'=>(string)Str::uuid(),
            'ngaylap' => Carbon::now(),
            'thoihan' => $dto_hopdong->getThoihan(),
            'tiencoc' => $dto_hopdong->getTiencoc(),
            'idphong'=>$dto_hopdong->getIdphong(),
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
    public function dto_idphong(string $idphong)
    {
        return app('db')->table('hopdong')->where('idphong',$idphong)->where('trangthai',true)->first();
    }
    public function form($rc):DTO_Hopdong
    {
        $tmp=new DTO_Hopdong();
        $tmp->setId($rc->id);
        $tmp->setIdphong($rc->idphong);
        $tmp->setNgaylap($rc->ngaylap);
        $tmp->setThoihan($rc->thoihan);
        $tmp->setTiencoc($rc->tiencoc);
        $tmp->setTrangthai($rc->trangthai);
        return $tmp;
    }
















}
