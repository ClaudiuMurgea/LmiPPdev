<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Welcome extends Component
{
    public $pid;
    public $userName;
    public $userPoints;
    public function mount()
    {
        $mac="00:1b:eb:91:a9:3d";
        
        $getPID = DB::connection('mysql_main')->select("select LmiPP.MAC2PID('".$mac."') PID");
        $this->pid = $getPID[0]->PID;
        
        if($this->pid) {
            $getName = DB::connection('mysql_main')->select("select lmi.GET_PLAYER_NAME('".$this->pid."') Name");
            $this->userName = $getName[0]->Name;
    
            $getPoints = DB::connection('mysql_master')->select("select lmi.GetMasterOnlyB1Points('".$this->pid."') Points");
            $this->userPoints = $getPoints[0]->Points;

        }
    }

    public function render()
    {
        return view('livewire.welcome');
    }
}
