<?php


namespace App\PREs;


use App\DAOs\DAO_Khachtro;

class PRE_Khachtro
{
    private DAO_Khachtro $dao_khach;

     public function __construct(DAO_Khachtro $dao_khach)
     {
         $this->dao_khach = $dao_khach;
     }




}
