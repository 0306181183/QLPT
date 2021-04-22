<?php


namespace App\Http\Controllers;
use App\PREs\PRE_Dichvu;
use App\Mes as MES;
use App\REPs\REP_Dichvu;
use App\VALs\VAL_Giadichvu;
use Illuminate\Http\Request;
use PHPUnit\Util\Json;

class DichvuController extends Controller
{


    private VAL_Giadichvu $val;
    private REP_Dichvu $rep;
    private PRE_Dichvu $pre;
    public function __construct(VAL_GiaDichvu $val, REP_Dichvu $rep, PRE_Dichvu $pre)
    {
        $this->val = $val;
        $this->rep = $rep;
        $this->pre = $pre;
    }
    public function sua_giadv(Request $request)
    {
        return $this->command_frame($request, $this->val, null, $this->rep, 'sua_giadv', MES::$suagiadv);
    }
}
