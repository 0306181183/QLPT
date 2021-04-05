<?php


namespace App\DAOs;


use App\DTOs\DTO_Xe;
use Illuminate\Support\Str;

class DAO_Xe
{
    public function add(DTO_Xe $dto_xe){
        app('db')->table('xe')->insert([
            'id'=>(string)Str::uuid(),
            'loaixe' => $dto_xe->getLoaixe(),
            'bienso' => $dto_xe->getBienso(),
            'idkhach' => $dto_xe->getIdkhach(),
        ]);
    }

    public function remove(string $id)
    {
        app('db')->table('xe')->where('id', $id)->delete();
    }

    public function dto_get(string $id)
    {
        return app('db')->table('xe')->where('id', $id)->first();
    }
}
