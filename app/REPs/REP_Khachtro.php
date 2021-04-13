<?php
namespace App\REPs;

use App\DAOs\DAO_Khachtro;
use App\DAOs\DAO_Xe;

class REP_Khachtro
{
    private DAO_Khachtro $dao_khachtro;
    private DAO_Xe $dao_xe;
    public function __construct(DAO_Khachtro $dao_khachtro,DAO_Xe $dao_xe)
    {
        $this->dao_khachtro=$dao_khachtro;
        $this->dao_xe=$dao_xe;
    }
    public function tao_khach($request)
    {
        
    }

}
