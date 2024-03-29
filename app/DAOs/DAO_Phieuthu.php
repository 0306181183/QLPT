<?php


namespace App\DAOs;




use App\DTOs\DTO_Phieuthu;
use Illuminate\Support\Str;

class DAO_Phieuthu
{
    public function add(DTO_Phieuthu $dto_phieuthu)
    {

        app('db')->table('phieuthu')->insert([
            'id'=>(string)Str::uuid(),
            'giaphong' => $dto_phieuthu->getGiaphong(),
            'tiendien' => $dto_phieuthu->getTiendien(),
            'tiennuoc' => $dto_phieuthu->getTiennuoc(),
            'tienwifi' => $dto_phieuthu->getTienwifi(),
            'tienxe'=> $dto_phieuthu->getTienxe(),
            'tienrac'=>$dto_phieuthu->getTienrac(),
            'tienquanly'=>$dto_phieuthu->getTienquanly(),
            'tranhthai'=>true,
            'idtrangthaithue'=>$dto_phieuthu->getIdtrangthaithue(),
        ]);

    }
    public function modify(string $id)
    {
        app('db')->table('phieuthu')->where('id', $id)->update([
            'trangthai' => false,
        ]);
    }


    public function dto_get(string $id)
    {
        return app('db')->table('phieuthu')->where('id', $id)->first();
    }

    public function form($rc):DTO_Phieuthu
    {
        $tmp=new DTO_Phieuthu();
        $tmp->setId($rc->id);
        $tmp->setTrangthai($rc->trangthai);
        $tmp->setGiaphong($rc->giaphong);
        $tmp->setIdtrangthaithue($rc->idtrangthaithue);
        $tmp->setTiendien($rc->tiendien);
        $tmp->setTienquanly($rc->tienquanly);
        $tmp->setTiennuoc($rc->tiennuoc);
        $tmp->setTienrac($rc->tienrac);
        $tmp->setTienwifi($rc->tienwifi);
        $tmp->setTienxe($rc->tienxe);
        return $tmp;
    }
    public function ktphieuthu(string $idhopdong)
    {
        return app('db')->table('phieuthu')
            ->join('trangthaithue','trangthaithue.id','=','phieuthu.idtrangthaithue')
            ->where('trangthaithue.idhopdong',$idhopdong)
            ->count();
    }
    public function phieuthu_idhopdong(string $idhopdong)
    {
        return app('db')->table('phieuthu')
            ->join('trangthaithue','trangthaithue.id','=','phieuthu.idtrangthaithue')
            ->where('trangthaithue.idhopdong',$idhopdong)
            ->orderBy('trangthaithue.ngaylap','DESC')
            ->first();
    }




}
