<?php

namespace App\Http\Controllers;

use App\Mes;
use Exception;
use Illuminate\Http\JsonResponse as JSON;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    //
    protected function command_frame($request, $val, $pre, $rep, $name, $success_message)
    {
        $tmp = $val->$name($request);
        if ($tmp) return $this->invalid_response($tmp);

        if ($pre != null) {
            $tmp = $pre->$name($request);
            if ($tmp['result'] == True) return $this->conflict_response($tmp['message']);
        }
        $tmp = $rep->$name($request);

//        if ($tmp) return $this->unexpected_response();
        if ($tmp) return $tmp->getMessage();


        return response()->json(['success' => $success_message]);

    }

/*    protected function query_frame($request, $val, $rep, $name): JSON
    {
        if ($val != null) {
            $tmp = $val->$name($request);
            if ($tmp) return $this->invalid_response($tmp);
        }

        $tmp = $rep->$name($request);

        if ($tmp instanceof Exception) return $this->unexpected_response();
//        if ($tmp instanceof Exception) return $tmp->getMessage();

        return response()->json($tmp, MES::$query_success_status_code);
    }*/

    protected function invalid_response($error_message)
    {
        return response()->json(['invalid' => $error_message], 400);
    }

    protected function conflict_response($message)
    {
        $message = $message == Null ? MES::$conflict : $message;
        return response()->json(['conflict' => $message], 409);
    }

    protected function unexpected_response(): JSON
    {
        return response()->json(['unexpected' => MES::$unexpected], 500);
    }
}
