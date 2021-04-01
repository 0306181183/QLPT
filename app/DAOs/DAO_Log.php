<?php


namespace App\DAOs;




use App\DTOs\DTO_Log;

class DAO_Log
{
    public function add(DTO_Log $dto_log)
    {
        app('db')->table('log')->insert([
            'id'=>$dto_log->getId(),
            'idloai'=>$dto_log->getIdloai(),
            'noidung'=>$dto_log->getNoidung(),
            'idhopdong'=>$dto_log->getIdhopdong(),
            'ngaylap'=>date('Y-m-d H:i:s')
        ]);
    }





}
