<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Welcome extends Component
{
    public $pid;
    public $userName;
    public $userPoints;
    public $lang;
    public function mount()
    {
        $mac="00:2e:15:00:14:82";
        
        $getPID = DB::connection('mysql_main')->select("select LmiPP.MAC2PID('".$mac."') PID");
        $this->pid = $getPID[0]->PID;
        $this->lang = \Session::get('idleLang');
            // if(\Session::get('idleLang') == 'Ro')
            // {
            //     $this->lang = true;
            // }
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
