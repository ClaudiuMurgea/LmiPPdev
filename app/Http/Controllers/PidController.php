<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Cookie;

class PidController extends Controller
{
    public function index(Request $request, $mac) {
        // $mac="00:2e:15:00:14:82";
        // $mac = Cookie::get('LmiMacNew');

        // Z$mac = $test;

        // $currentURL = url()->current();

        // $mac = config('database.mac');

        // $currentURL = url()->current();
        // $url_components = parse_url($currentURL);
        // parse_str($url_components['query'], $params);
        // $mac = config('database.mac');

        $getPID = DB::connection('mysql_main')->select("select LmiPP.MAC2PID('".$mac."') PID");
        return response()->json([
            'success' => $getPID[0]->PID
        ]);
    }
}
