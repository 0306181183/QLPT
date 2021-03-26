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
            'idkhach'=>'f7996832-1029-40e9-979a-203cd68abc9e',

        ];

        $this->call('POST', 'them-xe', $input);
        $this->seeJsonEquals(['success' => MES::$themxe]);
        $this->seeStatusCode(200);
    }

    public function testDelete(){
        $input = [
            'idkhach'=>'a93023c1-8c84-4b6c-99e6-a19be25331a7',
        ];

        $this->call('POST', 'xoa-xe', $input);
        $this->seeJsonEquals(['success' => MES::$xoaxe]);
        $this->seeStatusCode(200);
    }



}
