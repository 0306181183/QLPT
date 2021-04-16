<?php
namespace App\REPs;

use App\DAOs\DAO_Giadichvu;
use App\DTOs\DTO_Giadichvu;
use Exception;

class REP_Dichvu
{
    private DAO_Giadichvu $dao_dichvu;
    public function __construct(DAO_Giadichvu $dao_dichvu)
    {
        $this->dao_dichvu=$dao_dichvu;
    }
    public function sua_giadv($request)
    {
        try {
            $dto_dichvu=new DTO_Giadichvu();
            $dto_dichvu->setIdloai($request->idloai);
            $dto_dichvu->setGiathaydoi($request->giathaydoi);
            $this->dao_dichvu->add($dto_dichvu);
        }catch (Exception $e)
        {
            return $e;
        }
        return false;

    }
}
