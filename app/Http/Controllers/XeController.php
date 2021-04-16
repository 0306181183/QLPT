<?php


namespace App\Http\Controllers;
use App\PREs\PRE_Xe;
use App\REPs\REP_Xe;
use App\VALs\VAL_Xe;
use Illuminate\Http\Request;
use App\Mes as MES;
use PHPUnit\Util\Json;

class XeController extends Controller
{
    private VAL_Xe $val;
    private REP_Xe $rep;
    private PRE_Xe $pre;
    public function __construct(VAL_Xe $val, REP_Xe $rep, PRE_Xe $pre)
    {
        $this->val = $val;
        $this->rep = $rep;
        $this->pre = $pre;
    }
    public function them_xe(Request $request) :Json
    {
        return $this->command_frame($request, $this->val, null, $this->rep, 'them_xe', MES::$themxe);
    }
    public function xoa_xe(Request $request) :Json
    {
        return $this->command_frame($request, $this->val, null, $this->rep, 'xoa_xe', MES::$xoaxe);
    }
}
