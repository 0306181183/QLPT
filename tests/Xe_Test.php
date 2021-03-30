<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Laravel\Lumen\Testing\WithoutMiddleware;
use Messages as MES;
class Xe_Test extends TestCase
{
    use DatabaseTransactions;
    use WithoutMiddleware;

    public function testCreate(){
        $input = [
            'loaixe'=>'wave',
            'bienso' => '12b-3456',
            'idkhach'=>$this->khach1,

        ];

        $this->call('POST', 'them-xe', $input);
        $this->seeJsonEquals(['success' => MES::$themxe]);
        $this->seeStatusCode(200);
        $this->seeInDatabase('xe',$input);

    }

    public function testDelete(){
        $input = [
            'idxe'=>$this->xe1,
        ];

        $this->call('POST', 'xoa-xe', $input);
        $this->seeJsonEquals(['success' => MES::$xoaxe]);
        $this->seeStatusCode(200);
        $this->notSeeInDatabase('xe',$input);
    }



}
