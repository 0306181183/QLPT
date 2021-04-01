<?php


namespace App\DAOs;




use App\DTOs\DTO_Trangthaithue;

class DAO_TrangthaiThue
{
    public function add(DTO_Trangthaithue $dto_ttt)
    {
        app('db')->table('trangthaithue')->insert([
            'id'=>$dto_ttt->getId(),
            'chisodien'=>$dto_ttt->getChisodien(),
            'idhopdong'=>$dto_ttt->getIdhopdong(),
            'soxe'=>$dto_ttt->getSoxe(),
            'songuoi'=>$dto_ttt->getSonguoi(),
            'giaphong'=>$dto_ttt->getGiaphong(),
            'ngaylap'=>date('Y-m-d')
        ]);
    }





}
