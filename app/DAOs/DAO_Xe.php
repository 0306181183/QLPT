<?php


namespace App\DAOs;


use App\DTOs\DTO_Xe;

class DAO_Xe
{
    public function add(DTO_Xe $dto_xe){
        app('db')->table('xe')->insert([
            'id' =>$dto_xe->getId(),
            'loaixe' => $dto_xe->getLoaixe(),
            'bienso' => $dto_xe->getBienso(),
            'idkhach' => $dto_xe->getIdkhach(),
        ]);
    }

    public function remove(string $id)
    {
        app('db')->table('xe')->where('id', $id)->delete();
    }
}
