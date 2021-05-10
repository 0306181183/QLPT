<?php


namespace App\DAOs;


use App\DTOs\DTO_Phieuthu;
use App\DTOs\DTO_Xe;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

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
    public function get_idkhach(string $idkhach)
    {
        return app('db')->table('xe')->where('idkhach',$idkhach)->count();
    }
    public function remove_idkhach(string $idkhach)
    {
         app('db')->table('xe')->where('idkhach',$idkhach)->delete();
    }
    public function form($rc):DTO_Xe
    {
        $tmp=new DTO_Xe();
        $tmp->setId($rc->id);
        $tmp->setBienso($rc->bienso);
        $tmp->setIdkhach($rc->idkhach);
        $tmp->setLoaixe($rc->loaixe);
        return $tmp;
    }
    public function soxe_HD(string $idhopdong)
    {
        return app('db')->table('hopdong')
            ->join('khachtro','hopdong.id','=','khachtro.idhopdong')
            ->join('xe','khachtro.id','=','xe.idkhach')
            ->where('hopdong.id',$idhopdong)
            ->count();
    }
}
/*->join('khachtro','hopdong.id','=','khachtro.idhopdong')
    ->join('xe','khachtro.id','=','xe.idkhach')*/
