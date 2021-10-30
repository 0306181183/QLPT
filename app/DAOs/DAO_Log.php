<?php


namespace App\DAOs;


use App\DTOs\DTO_Log;
use Carbon\Carbon;
use Carbon\Traits\Date;
use Illuminate\Support\Str;
use PhpParser\Node\Scalar\String_;

class DAO_Log
{

    public function add(DTO_Log $dto_log)
    {
        var_dump($dto_log);
        app('db')->table('log')->insert([
            'id'=>(string)Str::uuid(),
            'idloai'=>$dto_log->getIdloai(),
            'noidung'=>json_encode($dto_log->getNoidung()),
            'idhopdong'=>$dto_log->getIdhopdong(),
            'ngaylap'=>Carbon::now(),
        ]);

    }


    public function dto_get(string $id)
    {
        return app('db')->table('log')->where('id', $id)->first();
    }

    public function form($rc):DTO_Log
    {
        $tmp=new DTO_Log();
        $tmp->setId($rc->id);
        $tmp->setIdhopdong($rc->idhopdong);
        $tmp->setNgaylap($rc->ngaylap);
        $tmp->setIdloai($rc->idloai);
        $tmp->setNoidung(json_decode($rc->noidung,1));
        return $tmp;
    }
 public function loggiatri(string $hopdong,string $loai) //1 //7
    {
        $thoigian=Carbon::now();
        $time=$thoigian->subMonth();
        $thang=$time->month;
        $nam=$time->year;
        $ngay=$nam."-".$thang."-02";
        return app('db')->table('log')->where('idloai',$loai)->where('idhopdong',$hopdong)->whereDate('ngaylap','<',$ngay)->orderBy('ngaylap','DESC')->first();
    }
    public function  slkhach(string $idhopdong,string $loai)//2 3
    {
        $thoigian=Carbon::now();
        $time=$thoigian->subMonth();
        $thang=$time->month;
        $nam=$time->year;
        $ngay=$nam."-".$thang."-15";
        return app('db')->table('log')->where('idloai',$loai)->where('idhopdong',$idhopdong)->whereDate('ngaylap','>',$ngay)->count();
    }
    public function  dsxe(string $idhopdong,string $loai)//4 5
    {
        $thoigian=Carbon::now();
        $time=$thoigian->subMonth();
        $thang=$time->month;
        $nam=$time->year;
        $ngay=$nam."-".$thang."-01";
        return app('db')->table('log')->where('idloai',$loai)->where('idhopdong',$idhopdong)->whereDate('ngaylap','>',$ngay)->get();
    }
    public function chisodien(string $idhopdong) //6
    {
        return app('db')->table('log')->where('idloai',6)->where('idhopdong',$idhopdong)->orderBy('ngaylap','DESC')->first();
    }
    public function giaphong(string $idhopdong)
    {
        $thoigian=Carbon::now()->subDay(14);
        return app('db')->table('log')->where('idloai',1)->where('idhopdong',$idhopdong)->whereDate('ngaylap','<',$thoigian)->orderBy('ngaylap','DESC')->first();
    }
    public function wifi(string $idhopdong)
    {
        return app('db')->table('log')->where('idloai',7)->where('idhopdong',$idhopdong)->whereDate('ngaylap','<',Carbon::now())->orderBy('ngaylap','DESC')->first();
    }
    public function soluongmoi(string $idhopdong,int $loai)
    {
        $thoigian=Carbon::now()->subDay(15);
        return app('db')->table('log')->where('idloai',$loai)->where('idhopdong',$idhopdong)->whereDate('ngaylap','>',$thoigian)->count();
    }








}
