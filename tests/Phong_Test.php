<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use Laravel\Lumen\Testing\WithoutMiddleware;

class ExampleTest extends TestCase
{
    use DatabaseTransactions;
    use WithoutMiddleware;
    public function testCreate()
    {


    }
}
