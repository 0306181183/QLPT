<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Laravel\Lumen\Testing\WithoutMiddleware;

use App\Mes as MES;

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
            'idphong'=>$this->phongchuathue1,
            'tenphong' => 'Phòng 1',
            'songuoimax' => 4,
        ];
        $data=[
            'id'=>$input['idphong'],
            'tenphong'=>$input['tenphong'],
            'songuoimax'=>$input['songuoimax']
        ];

        $this->call('POST', 'sua-phong', $input);
        $this->seeJsonEquals(['success' => MES::$suaphong]);
        $this->seeStatusCode(200);
        $this->seeInDatabase('phong',$data);
    }

    public function testUpdate_fail()
    {
        $input = [
            'idphong'=>$this->phongdathue1,
            'tenphong' => 'Phòng đã thuê',
            'songuoimax' => 1,
        ];

        $this->call('POST', 'sua-phong', $input);
        $this->seeJsonEquals(['conflict' => MES::$suaphong_fail]);
        $this->seeStatusCode(409);

    }

    public function testUpdate1(){
        $input = [
            'idphong'=>$this->phongdathue1,
            'tenphong' => 'Phòng đã thuê',
            'songuoimax' => 3,
        ];
        $data=[
            'id'=>$input['idphong'],
            'tenphong'=>$input['tenphong'],
            'songuoimax'=>$input['songuoimax']
        ];
        $this->call('POST', 'sua-phong', $input);
        $this->seeJsonEquals(['success' => MES::$suaphong]);
        $this->seeStatusCode(200);
        $this->seeInDatabase('phong',$data);
    }

    public function testClose(){
        $input = [
            'idphong'=>$this->phongchuathue1

        ];
        $data=[
            'id'=>$input['idphong'],
            'trangthai'=>false
        ];

        $this->call('POST', 'dong-phong', $input);
        $this->seeJsonEquals(['success' => MES::$dongphong]);
        $this->seeStatusCode(200);
        $this->seeInDatabase('phong',$data);
    }

    public function testCloseFail(){
        $input = [
            'idphong'=>$this->phongdathue1,
        ];

        $this->call('POST', 'dong-phong', $input);
        $this->seeJsonEquals(['conflict' => MES::$dongphong_fail]);
        $this->seeStatusCode(409);

    }

    public function testOpen(){
        $input = [
            'idphong'=>$this->phongdong

        ];
        $data=[
            'id'=>$input['idphong'],
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
        $data=[
            'id'=>$input['idphong'],
            'giaphong'=>$input['giaphong']
        ];
        $data1 = [
          'idloai'=>1,
            'noidung'=>[
                'idphong'=>$input['idphong'],
                'giaphong'=>$input['giaphong'],
                ],
            'idhopdong'=>$this->hopdong
        ];


        $this->call('POST', 'sua-giaphong', $input);
        $this->seeJsonEquals(['success' => MES::$suagiaphong]);
        $this->seeStatusCode(200);
        $this->seeInDatabase('phong',$data);
        $this->assertTrue($this->compareLog($data1));

    }
    public function testUpdatePrice2(){
        $input = [
            'idphong'=>$this->phongchuathue1,
            'giaphong' => 3000000,
        ];
        $data=[
            'id'=>$input['idphong'],
            'giaphong'=>$input['giaphong']
        ];
        $this->call('POST', 'sua-giaphong', $input);
        $this->seeJsonEquals(['success' => MES::$suagiaphong]);
        $this->seeStatusCode(200);
        $this->seeInDatabase('phong',$data);
    }


}
