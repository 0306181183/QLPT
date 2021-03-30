<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Laravel\Lumen\Testing\WithoutMiddleware;
use Messages as MESS;
class Dichvu_Test extends TestCase
{
    use DatabaseTransactions;
    use WithoutMiddleware;

    public function testUpdate(){
        $input = [
            'loaidichvu'=>1,
           'giathaydoi'=>3500,

        ];

        $this->call('POST', 'sua-giadv', $input);
        $this->seeJsonEquals(['success' => MESS::$suagiadv]);
        $this->seeStatusCode(200);
<<<<<<< HEAD
        $this->seeInDatabase('giadichvu',$input);
=======

>>>>>>> ccc077e6594f56a1a1a346dbdd306ed0bc06838a
    }





}
