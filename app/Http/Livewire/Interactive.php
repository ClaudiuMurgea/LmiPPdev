<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Interactive extends Component
{
    public $page;
    public $initial = 0;
    public $isLoading               = true;
    public $noLoading               = true;
    public $showReturn              = true;
    public $showSystemJackpots      = true;
    public $showExternalJackpots    = true;
    public $getExternalJackpots     = false;
    public $getInternalJackpots     = false;

    public $cashouts                = false;
    public $jackpots                = false;
    public $showJackpot             = false;
    public $jackpotValue;
    public $jackpotTitle;

    public function render()
    {
        // $time = now()->toDateTimeString();
        // dd($time);
        $mac="00:2e:15:00:14:82";

        $getDeviceID =  DB::connection('mysql_main')->select("SELECT DeviceID FROM lmi.devices_last WHERE MAC='$mac'");
            $DeviceID= $getDeviceID[0]->DeviceID;

        $cashoutValues = '';
        if($this->cashouts)
        {
            $getCashouts= DB::connection('mysql_main')->select("SELECT Slot,FORMAT((Value/100),2) Value,Timestamp FROM lmi.Handpays WHERE DeviceID=$DeviceID ORDER BY `Timestamp` DESC LIMIT 10");
                $cashoutValues = $getCashouts;
        }
        if($this->jackpots) 
        {
            $this->getExternalJackpots = DB::connection('mysql_main')->select("call LmiPP.GetSystemJackpotsNames");
            $this->getInternalJackpots = DB::connection('mysql_main')->select("call LmiPP.GetExternalJackpotsNames");
        }
        return view('livewire.interactive', ['cashoutValues' => $cashoutValues]);
    }
    public function goTo($page)
    {
        return redirect("/$page");
    }
    public function wannabe()
    {
        $this->isLoading = false;
    }
    public function showThis($page) 
    {
        $this->$page = true;
        $this->initial = 1;
        $this->noLoading = false;
    }
    public function previous($page = null)
    {
        $this->jackpots     = false;
        $this->cashouts     = false;
        $this->showJackpot  = false;
        $this->$page        = true;
        if($page) {
            $this->noLoading= false;
        } else {
            $this->noLoading= true;
        }
    }
    public function showJackpot($name, $id = null)
    {
        $this->jackpots     = false;
        $this->showJackpot  = true;
        $this->jackpotTitle = ucfirst($name);
        $this->page         = 'ShowJackpot';
        if($id == null) {
            //logica pt external
            $this->jackpotValue = DB::connection('mysql_main')->select("call LmiPP.GetExternalJackpotsValues('$name', '10')");
        } else {
            //logica pt internal
            $this->jackpotValue = DB::connection('mysql_main')->select("call LmiPP.GetSystemJackpotsValues('$id', '10')");
        }
    }
}
