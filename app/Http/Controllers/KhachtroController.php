<?php


namespace App\Http\Controllers;

use App\PREs\PRE_Khachtro;
use App\REPs\REP_Khachtro;
use App\VALs\VAL_Khachtro;
use Illuminate\Http\Request;
use Messages as MES;
use PHPUnit\Util\Json;

class KhachtroController extends Controller
{
    private VAL_Khachtro $val;
    private REP_Khachtro $rep;
    private PRE_Khachtro $pre;
    public function __construct(VAL_Khachtro $val, REP_Khachtro $rep, PRE_Khachtro $pre)
    {
        $this->val = $val;
        $this->rep = $rep;
        $this->pre = $pre;
    }
    public function tao_khach(Request $request) :Json
    {
        return $this->command_frame($request, $this->val, null, $this->rep, 'tao_khach', MES::$taokhach);
    }
    public function sua_khach(Request $request) :Json
    {
        return $this->command_frame($request, $this->val, null, $this->rep, 'sua_khach', MES::$suakhach);
    }
    public function  xoa_khach(Request $request):Json
    {
        return $this->command_frame($request, $this->val, $this->pre, $this->rep, 'xoa_khach', MES::$xoakhach);
    }
}
