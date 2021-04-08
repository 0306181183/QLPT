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
        $this->seeInDatabase('phong',$input);


    }

    public function testUpdate()
    {
        $input = [
            'id'=>$this->phongchuathue1,
            'tenphong' => 'Phòng 1',
            'songuoimax' => 4,
        ];

        $this->call('POST', 'sua-phong', $input);
        $this->seeJsonEquals(['success' => MES::$suaphong]);
        $this->seeStatusCode(200);

        $this->seeInDatabase('phong',$input);
    }

    public function testUpdate_fail()
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

    public function testUpdate1(){
        $input = [
            'id'=>$this->phongdathue1,
            'tenphong' => 'Phòng đã thuê',
            'songuoimax' => 3,
        ];

        $this->call('POST', 'sua-phong', $input);
        $this->seeJsonEquals(['success' => MES::$suaphong]);
        $this->seeStatusCode(200);
        $this->seeInDatabase('phong',$input);
    }

    public function testClose(){
        $input = [
            'id'=>$this->phongchuathue1

        ];
        $data=[
            'id'=>$input['id'],
            'trangthai'=>false
        ];

        $this->call('POST', 'dong-phong', $input);
        $this->seeJsonEquals(['success' => MES::$dongphong]);
        $this->seeStatusCode(200);
        $this->seeInDatabase('phong',$data);
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
            'id'=>$this->phongdong

        ];
        $data=[
            'id'=>$input['id'],
            'trangthai'=>true
        ];
        $this->call('POST', 'mo-phong', $input);
        $this->seeJsonEquals(['success' => MES::$mophong]);
        $this->seeStatusCode(200);
        $this->seeInDatabase('phong',$data);

    }

    public function testUpdatePrice1(){
        $input = [
            'idphong'=>$this->phongdathue1,
            'giaphong' => 3000000,
        ];
        $data = [
          'idloai'=>1,
            'noidung'=>[
                'giaphong'=>$input['giaphong'],
                'idphong'=>$input['idphong']
            ],

        ];


        $this->call('POST', 'sua-giaphong', $input);
        $this->seeJsonEquals(['success' => MES::$suagiaphong]);
        $this->seeStatusCode(200);
        $this->seeInDatabase('phong',$input);
        $this->seeInDatabase('log',$data);

    }
    public function testUpdatePrice2(){
        $input = [
            'idphong'=>$this->phongchuathue1,
            'giaphong' => 3000000,
        ];
        $this->call('POST', 'sua-giaphong', $input);
        $this->seeJsonEquals(['success' => MES::$suagiaphong]);
        $this->seeStatusCode(200);
        $this->seeInDatabase('phong',$input);
    }


}
