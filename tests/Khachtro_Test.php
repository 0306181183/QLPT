<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Laravel\Lumen\Testing\WithoutMiddleware;
use Messages as mess;

class Khachtro_Test extends TestCase
{
    use DatabaseTransactions;
    use WithoutMiddleware;
    public function testCreate()
    {
        $input=[
          'tenkhach'=>'Võ Văn A',
            'cmnd'=>'12345678904',
            'gioitinh'=>1,
            'ngaysinh'=>'2000/2/12',
            'quequan'=>'Tp.HCM',
        ];
        $this->call('POST','tao-khach',$input);
        $this->seeJsonEquals(['success'=>mess::$taokhach]);
        $this->seeStatusCode(200);

    }
    public  function  testUpdate()
    {
        $input=[
            'id'=>$this->khach1,
            'tenkhach'=>'Võ Văn B',
            'cmnd'=>'12345678904',
            'gioitinh'=>true,
            'ngaysinh'=>'2000/2/11',
            'quequan'=>'Tp.HCM'
        ];
        /*$data=[
            'id'=>$input['id'],
            'tenkhach'=>$input['tenkhach'],
            'cmnd'=>$input['cmnd'],
            'gioitinh'=>$input['gioitinh'],
            'ngaysinh'=>$input['ngaysinh'],
            'quequan'=>$input['quequan']
        ];*/
        $this->call('POST','sua-khach',$input);
        $this->seeJsonEquals(['seccess'=>mess::$suakhach]);
        $this->seeStatusCode(200);
        $this->seeInDatabase('KhachTro',$input);

    }
    public  function  testDelete()
    {
        $input=[
            'id'=>$this->khach3
        ];
        $data=[
           'id'=>$input['id'],
            'trangthai'=>false
        ];
        $this->call('POST','xoa-khach',$input);
        $this->seeJsonEquals(['seccess'=>mess::$dongphong]);
        $this->seeStatusCode(200);
        $this->seeInDatabase('KhachTro', $data);
    }
    public function testDelete_fail()
    {
        $input=[
          'id'=>$this->khach1
        ];
        $this->call('POST','xoa-khach',$input);
        $this->seeJsonEquals(['conflict'=>mess::$xoakhach_fail]);
        $this->seeStatusCode(409);
    }
}
