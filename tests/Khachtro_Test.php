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
        $this->call('POST','taokhach',$input);
        $this->seeJsonEquals(['success'=>mess::$taokhach]);

    }
}
