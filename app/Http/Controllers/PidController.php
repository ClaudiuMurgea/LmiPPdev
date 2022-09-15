<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PidController extends Controller
{
    public function index() {
        $mac="00:1b:eb:91:a9:3d";
        $getPID = DB::connection('mysql_main')->select("select LmiPP.MAC2PID('".$mac."') PID");

        return response()->json([
            'success' => $getPID[0]->PID
        ]);
    }
}
