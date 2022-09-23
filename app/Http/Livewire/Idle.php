<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Idle extends Component
{
    public $idle = true;
    public $show = true;
    public $isLoading = false;
    public $lang;
    public function mount()
    {
        $this->lang = \Session::get('idleLang');
    }
    public function render()
    {
        $mac="00:2e:15:00:14:82";
        $getPID = DB::connection('mysql_main')->select("select LmiPP.MAC2PID('".$mac."') PID");
        $activePID = $getPID[0]->PID;
        if($activePID!="0" && $this->show)
            redirect("/");

        return view('livewire.idle', ['activePID' => $activePID]);
    }
    public function showIdlePages() {
        $this->show = false;
        return redirect("interactive-idle");
    }
}
