<?php



namespace App\Http\Controllers;
use Messages as MES;
use App\PREs\PRE_Phong;
use App\REPs\REP_Phong;
use App\VALs\VAL_Phong;
use Illuminate\Http\JsonResponse as Json;
use Illuminate\Http\Request;

class PhongController extends Controller
{
    private VAL_Phong $val;
    private REP_Phong $rep;
    private PRE_Phong $pre;

    public function __construct(VAL_Bag $val, REP_Bag $rep, PRE_Bag $pre)
    {
        $this->val = $val;
        $this->rep = $rep;
        $this->pre = $pre;
    }
    public function tao_phong(Request $request): Json
    {
        return $this->command_frame($request, $this->val, null, $this->rep, 'tao_phong', MES::$taophong);
    }
    public function sua_phong(Request $request): Json
    {
        return $this->command_frame($request, $this->val, $this->pre, $this->rep, 'sua_phong', MES::$suaphong);
    }
    public function sua_giaphong(Request $request): Json
    {
        return $this->command_frame($request, $this->val, null, $this->rep, 'sua_giaphong', MES::$suagiaphong);

    }
    public function mo_phong(Request $request): Json
    {
        return $this->command_frame($request, $this->val, null, $this->rep, 'mo_phong', MES::$mophong);
    }
    public function dong_phong(Request $request): Json
    {
        return $this->command_frame($request, $this->val, $this->pre, $this->rep, 'dong_phong', MES::$dongphong);
    }

}
