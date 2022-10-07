<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;

class PidController extends Controller
{
    public function index() {
        // $mac="00:2e:15:00:14:82";
        // $mac = Cookie::get('LmiMacNew');

        // $macURL = $_GET["MAC"];
        $mac = Cookie::get('LmiMacNew');

        $getPID = DB::connection('mysql_main')->select("select LmiPP.MAC2PID('".$mac."') PID");
        return response()->json([
            'success' => $getPID[0]->PID
        ]);
    }
}
