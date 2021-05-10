<?php


namespace App\DAOs;




use App\DTOs\DTO_Trangthaithue;
use Carbon\Carbon;
use Illuminate\Support\Str;

class DAO_TrangthaiThue
{
    public function add(DTO_Trangthaithue $dto_ttt)
    {
        $id=(string)Str::uuid();
        app('db')->table('trangthaithue')->insert([
            'id'=>$id,
            'chisodien'=>$dto_ttt->getChisodien(),
            'idhopdong'=>$dto_ttt->getIdhopdong(),
            'soxe'=>$dto_ttt->getSoxe(),
            'songuoi'=>$dto_ttt->getSonguoi(),
            'giaphong'=>$dto_ttt->getGiaphong(),
            'wifi'=>$dto_ttt->getWifi(),
            'ngaylap'=>Carbon::now(),
        ]);
        return $id;
    }


    public function modify(DTO_Trangthaithue $dto_ttt)
    {
        app('db')->table('trangthaithue')->where('id',$dto_ttt->getId())->update([
            'chisodien' => $dto_ttt->getChisodien(),
            'soxe' => $dto_ttt->getSoxe(),
            'songuoi'=>$dto_ttt->getSonguoi(),
            'giaphong' => $dto_ttt->getGiaphong(),
            'wifi'=>$dto_ttt->getWifi(),
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

    public function get_TrangThaiThue(string $idhopdong){
        return app('db')->table('trangthaithue')->where('idhopdong',$idhopdong)->orderBy('ngaylap','desc')->first();
    }
    public function ktthanhtoan(string $idhopdong)
    {
        $time =Carbon::now();
        $thang=$time->month;
        $nam=$time->year;
        $ngay=$nam."-".$thang."-01";
        return app('db')->table('trangthaithue')->where('idhopdong',$idhopdong)->whereDate('ngaylap','>=',$ngay)->orderBy('ngaylap','desc')->count();
    }





}
