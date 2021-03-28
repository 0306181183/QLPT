<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Laravel\Lumen\Testing\WithoutMiddleware;

use Messages as MES;

class Phong_Test extends TestCase
{
    use DatabaseTransactions;
    use WithoutMiddleware;
    public function testCreate()
    {
        $input = [
            'tenphong' => 'Phòng test',
            'songuoimax' => 4,
            'giaphong' => 3000000,
        ];

        $this->call('POST', 'tao-phong', $input);
        $this->seeJsonEquals(['success' => MES::$taophong]);
        $this->seeStatusCode(200);

    }

    public function testUpdate_1()
    {
        $input = [
            'id'=>$this->phongchuathue1,
            'tenphong' => 'Phòng 1',
            'songuoimax' => 4,
        ];

        $this->call('POST', 'sua-phong', $input);
        $this->seeJsonEquals(['success' => MES::$suaphong]);
        $this->seeStatusCode(200);

    }

    public function testUpdateFail()
    {
        $input = [
            'id'=>$this->phongdathue1,
            'tenphong' => 'Phòng đã thuê',
            'songuoimax' => 1,
        ];

        $this->call('POST', 'sua-phong', $input);
        $this->seeJsonEquals(['conflict' => MES::$suaphong_fail]);
        $this->seeStatusCode(409);
    }

    public function testUpdate_2(){
        $input = [
            'id'=>$this->phongdathue1,
            'tenphong' => 'Phòng đã thuê',
            'songuoimax' => 3,
        ];

        $this->call('POST', 'sua-phong', $input);
        $this->seeJsonEquals(['success' => MES::$suaphong]);
        $this->seeStatusCode(200);
    }

    public function testClose(){
        $input = [
            'id'=>$this->phongchuathue1,
            'trangthai' => 0,

        ];

        $this->call('POST', 'dong-phong', $input);
        $this->seeJsonEquals(['success' => MES::$dongphong]);
        $this->seeStatusCode(200);
    }

    public function testCloseFail(){
        $input = [
            'id'=>$this->phongdathue1,
            'trangthai' => 0,

        ];

        $this->call('POST', 'dong-phong', $input);
        $this->seeJsonEquals(['conflict' => MES::$dongphong_fail]);
        $this->seeStatusCode(409);
    }

    public function testOpen(){
        $input = [
            'id'=>$this->phongdong,
            'trangthai' => 1,

        ];

        $this->call('POST', 'mo-phong', $input);
        $this->seeJsonEquals(['success' => MES::$mophong]);
        $this->seeStatusCode(200);
    }

    public function testUpdatePrice(){
        $input = [
            'id'=>$this->phongdathue1,
            'giaphong' => 3000000,

        ];

        $this->call('POST', 'sua-gia-phong', $input);
        $this->seeJsonEquals(['success' => MES::$suagiaphong]);
        $this->seeStatusCode(200);
    }


}
