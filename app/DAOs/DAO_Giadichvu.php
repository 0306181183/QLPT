<?php


namespace App\DAOs;




use App\DTOs\DTO_Giadichvu;
use Carbon\Carbon;
use Illuminate\Support\Str;

class DAO_Giadichvu
{
    public function add(DTO_Giadichvu $dto_giadv)
    {
        app('db')->table('giadichvu')->insert([
            'id'=>(string)Str::uuid(),
            'idloai' => $dto_giadv->getIdloai(),
            'giathaydoi' => $dto_giadv->getGiathaydoi(),
            'ngaythaydoi' => Carbon::now(),
        ]);
    }

    public function dto_get(string $id)
    {
        return app('db')->table('giadichvu')->where('id', $id)->first();
    }

    public function form($rc):DTO_Giadichvu
    {
        $tmp=new DTO_Giadichvu();
        $tmp->setId($rc->id);
        $tmp->setIdloai($rc->idloai);
        $tmp->setGiathaydoi($rc->giathaydoi);
        $tmp->setNgaythaydoi($rc->ngaythaydoi);
        return $tmp;
    }




}
