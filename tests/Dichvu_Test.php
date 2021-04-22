<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Laravel\Lumen\Testing\WithoutMiddleware;
use app\Mes as MESS;
class Dichvu_Test extends TestCase
{
    use DatabaseTransactions;
    use WithoutMiddleware;

    public function testUpdate()
    {
        $input = [
            'idloai' => 1,
            'giathaydoi' => 3567,
        ];
        $this->call('POST', 'sua-giadv', $input);
        $this->seeJsonEquals(['success' => MESS::$suagiadv]);
        $this->seeStatusCode(200);
        $this->seeInDatabase('giadichvu', $input);
    }





}
