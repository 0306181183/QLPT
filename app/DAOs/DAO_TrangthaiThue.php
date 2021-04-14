<?php


namespace App\DAOs;




use App\DTOs\DTO_Trangthaithue;
use Illuminate\Support\Str;

class DAO_TrangthaiThue
{
    public function add(DTO_Trangthaithue $dto_ttt)
    {
        app('db')->table('trangthaithue')->insert([
            'id'=>(string)Str::uuid(),
            'chisodien'=>$dto_ttt->getChisodien(),
            'idhopdong'=>$dto_ttt->getIdhopdong(),
            'soxe'=>$dto_ttt->getSoxe(),
            'songuoi'=>$dto_ttt->getSonguoi(),
            'giaphong'=>$dto_ttt->getGiaphong(),
            'ngaylap'=>date('Y-m-d')
        ]);
    }

    public function dto_get(string $id)
    {
        return app('db')->table('trangthaithue')->where('id', $id)->first();
    }

    public function form($rc):DTO_Trangthaithue
    {
        $tmp=new DTO_Trangthaithue();
        $tmp->setId($rc->id);
        $tmp->setIdhopdong($rc->idhopdong);
        $tmp->setGiaphong($rc->giaphong);
        $tmp->setNgaylap($rc->ngaylap);
        $tmp->setChisodien($rc->chisodien);
        $tmp->setSonguoi($rc->songuoi);
        $tmp->setSoxe($rc->soxe);
        $tmp->setWifi($rc->wifi);
        return $tmp;
    }





}
