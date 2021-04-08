<?php


namespace App\PREs;


use App\DAOs\DAO_Phong;

class PRE_Phong
{
    private DAO_Phong $dao_phong;

     public function __construct(DAO_Phong $dao_phong)
     {
         $this->dao_phong = $dao_phong;
     }

    public function update($params): array
    {
        if ($this->dao_phong->isUpdatable($params->id))
            return ['result' => false, 'message' => Null];
        return ['result' => True, 'message' => MES::$phong_da_co_hop_dong];
    }


}
