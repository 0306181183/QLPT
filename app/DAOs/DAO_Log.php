<?php


namespace App\DAOs;




use App\DTOs\DTO_Log;
use Illuminate\Support\Str;

class DAO_Log
{
    public function add(DTO_Log $dto_log)
    {
        app('db')->table('log')->insert([
            'id'=>(string)Str::uuid(),
            'idloai'=>$dto_log->getIdloai(),
            'noidung'=>$dto_log->getNoidung(),
            'idhopdong'=>$dto_log->getIdhopdong(),
            'ngaylap'=>date('Y-m-d H:i:s')
        ]);
    }

    public function dto_get(string $id)
    {
        return app('db')->table('log')->where('id', $id)->first();
    }





}
