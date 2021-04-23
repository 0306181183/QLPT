<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Laravel\Lumen\Testing\WithoutMiddleware;
use app\Mes as mess;

class Khachtro_Test extends TestCase
{
    use DatabaseTransactions;
    use WithoutMiddleware;

    public function testCreate()
    {
        $input = [
            'tenkhach' => 'Võ Văn A',
            'cmnd' => '12345678904',
            'gioitinh' => true,
            'ngaysinh' => '2000-02-12',
            'quequan' => 'Tp.HCM',
        ];
        $data = [
            'tenkhach' => $input['tenkhach'],
            'cmnd' => $input['cmnd'],
            'gioitinh' => $input['gioitinh'],
            'ngaysinh' => $input['ngaysinh'],
            'quequan' => $input['quequan'],
            'trangthai' => true
        ];
        $this->call('POST', 'tao-khach', $input);
        $this->seeJsonEquals(['success' => mess::$taokhach]);
        $this->seeStatusCode(200);
        $this->seeInDatabase('khachtro', $data);

    }

    public function testUpdate()
    {
        $input = [
            'idkhach' => $this->khach1,
            'tenkhach' => 'Võ Văn B',
            'cmnd' => '12345678904',
            'gioitinh' => true,
            'ngaysinh' => '2000-02-11',
            'quequan' => 'Tp.HCM'
        ];
        $data = [
            'id' => $input['idkhach'],
            'tenkhach' => $input['tenkhach'],
            'cmnd' => $input['cmnd'],
            'gioitinh' => $input['gioitinh'],
            'ngaysinh' => $input['ngaysinh'],
            'quequan' => $input['quequan']
        ];

        $this->call('POST', 'sua-khach', $input);
        $this->seeJsonEquals(['success' => mess::$suakhach]);
        $this->seeStatusCode(200);
        $this->seeInDatabase('khachtro', $data);

    }

    public function testDelete()
    {
        $input = [
            'idkhach' => $this->khach3
        ];
        $data = [
            'id' => $input['idkhach'],
            'trangthai' => false
        ];
        $this->call('POST', 'xoa-khach', $input);
        $this->seeJsonEquals(['success' => mess::$xoakhach]);
        $this->seeStatusCode(200);
        $this->seeInDatabase('khachtro', $data);
    }

    public function testDelete_fail()
    {
        $input = [
            'idkhach' => $this->khach1
        ];
        $this->call('POST', 'xoa-khach', $input);
        $this->seeJsonEquals(['conflict' => mess::$xoakhach_fail]);
        $this->seeStatusCode(409);
    }


}
