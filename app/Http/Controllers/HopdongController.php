<?php


namespace App\Http\Controllers;

use App\PREs\PRE_Hopdong;
use App\REPs\REP_Hopdong;
use App\VALs\VAL_Hopdong;
use Illuminate\Http\Request;
use App\Mes as MES;
use PHPUnit\Util\Json;
class HopdongController extends Controller
{

    private VAL_Hopdong $val;
    private REP_Hopdong $rep;
    private PRE_Hopdong $pre;
    public function __construct(VAL_Hopdong $val, REP_Hopdong $rep, PRE_Hopdong $pre)
    {
        $this->val = $val;
        $this->rep = $rep;
        $this->pre = $pre;
    }
    public function tao_hopdong(Request $request) :Json
    {
        return $this->command_frame($request, $this->val, $this->pre, $this->rep, 'tao_hopdong', MES::$taohopdong);
    }
    public function ghi_dien(Request $request) :Json
    {
        return $this->command_frame($request, $this->val, $this->pre, $this->rep, 'ghi_dien', MES::$ghidien);
    }
    public function tao_phieuthu(Request $request) :Json
    {
        return $this->command_frame($request, $this->val, $this->pre, $this->rep, 'tao_phieuthu', MES::$taophieuthu);
    }
    public function thanh_toan(Request $request) :Json
    {
        return $this->command_frame($request, $this->val, null, $this->rep, 'tao_hopdong', MES::$taohopdong);
    }
    public function themnguoi_HD(Request $request) :Json
    {
        return $this->command_frame($request, $this->val, $this->pre, $this->rep, 'themnguoi_HD', MES::$themnguoivaoHD);
    }
    public function xoanguoi_HD(Request $request) :Json
    {
        return $this->command_frame($request, $this->val, $this->pre, $this->rep, 'xoanguoi_HD', MES::$xoanguoikhoiHD   );
    }
    public function wifi(Request $request) :Json
    {
        return $this->command_frame($request, $this->val, null, $this->rep, 'wifi', MES::$thaydoiwifi);
    }
}
