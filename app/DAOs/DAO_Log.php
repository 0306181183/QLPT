<?php


namespace App\DAOs;


use App\DTOs\DTO_Log;
use Carbon\Carbon;
use Illuminate\Support\Str;

class DAO_Log
{
    public function add(DTO_Log $dto_log)
    {
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





}
