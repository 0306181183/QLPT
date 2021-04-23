<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Laravel\Lumen\Testing\WithoutMiddleware;
use app\Mes as MES;
class Xe_Test extends TestCase
{
    use DatabaseTransactions;
    use WithoutMiddleware;


    //Có hợp đồng
    public function testCreate1(){
        $input = [
            'loaixe'=>'wave',
            'bienso' => '12b-3456',
            'idkhach'=>$this->khach1,

        ];
        $data=[
            'idloai'=>4,
            'noidung'=>[
                'idkhach'=>$input['idkhach']
            ],
            'idhopdong'=>$this->hopdong,
        ];

        $this->call('POST', 'them-xe', $input);
        $this->seeJsonEquals(['success' => MES::$themxe]);
        $this->seeStatusCode(200);
        $this->seeInDatabase('xe',$input);
       $this->assertTrue($this->compareLog($data));
    }
    //Không có hợp đồng
    public function testCreate2(){
        $input = [
            'loaixe'=>'lead',
            'bienso' => '12b-4212',
            'idkhach'=>$this->khach3,

        ];

        $this->call('POST', 'them-xe', $input);
        $this->seeJsonEquals(['success' => MES::$themxe]);
        $this->seeStatusCode(200);
        $this->seeInDatabase('xe',$input);
    }

    public function testDelete1(){
        $input = [
            'idxe'=>$this->xe1,
        ];
        $data=[
            'id'=>$input['idxe'],
        ];
        $data_log=[
            'idloai'=>5,
            'noidung'=>[
                'idkhach'=>$this->khach1,
            ],
            'idhopdong'=>$this->hopdong,

        ];

        $this->call('POST', 'xoa-xe', $input);
        $this->seeJsonEquals(['success' => MES::$xoaxe]);
        $this->seeStatusCode(200);
        $this->notSeeInDatabase('xe',$data);
        $this->assertTrue($this->compareLog($data_log));

    }
    public function testDelete2(){
        $input = [
            'idxe'=>$this->xe2,
        ];
        $data=[
            'id'=>$input['idxe'],
        ];

        $this->call('POST', 'xoa-xe', $input);
        $this->seeJsonEquals(['success' => MES::$xoaxe]);
        $this->seeStatusCode(200);
        $this->notSeeInDatabase('xe',$data);
    }



}
