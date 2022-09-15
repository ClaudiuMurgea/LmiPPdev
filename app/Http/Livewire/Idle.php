<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Idle extends Component
{
    public function render()
    {
        $mac="00:1b:eb:91:a9:3d";
        $getPID = DB::connection('mysql_main')->select("select LmiPP.MAC2PID('".$mac."') PID");
        $activePID = $getPID[0]->PID;
        if($activePID!="0")
            redirect("/");

        return view('livewire.idle', ['activePID' => $activePID]);
    }
}
