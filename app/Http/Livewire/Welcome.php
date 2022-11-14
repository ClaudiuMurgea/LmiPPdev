<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\MainSetting;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Cookie;
use App\Models\MasterOnlyPlayerSetting;

class Welcome extends Component
{
    public $mac;
    public $pid;
    public $userName;
    public $userPoints;
    public $lang;
    
    public function mount()
    {
        // Getting the MAC from the URL, which is sent through ajax request from 'resources/views/livewire/application-livewire'
        $mac = $_GET["MAC"];
        $this->mac = str_replace('"', "", $mac);

        // Saving the mac inside a cookie if the cookie is not set (The cookie is used inside 'app/Http/Controllers/PidController.php')
        // if(!Cookie::get('LmiMacNew')){
        //     Cookie::queue('LmiMacNew', $this->mac, 2147483647);
        // }       

        if(config('database.mac') == ""){
            config(['database.mac' => $this->mac]);
        }
        
        // use MAC to get PID
        $getPID = DB::connection('mysql_main')->select("select LmiPP.MAC2PID('".$this->mac."') PID");
        $this->pid = $getPID[0]->PID;

        // Saving app default language settings or the user (if exists.
        $appSettings         = MainSetting::on('mysql_main')->first();
        try {
            $playerSettings      = MasterOnlyPlayerSetting::on('mysql_master')->where('PlayerID', $this->pid)->first();
        } catch (\Illuminate\Database\QueryException $e) {
            return $e->getMessage();
        }
     
        // The language ('lang' variable) will be the user custom language if it has a value in the database, or it will be equal to the application default language
        $this->lang = $playerSettings->CustomLanguage ?? $appSettings->DefaultLanguage;

        // Fetching the user name and points to be displayed on the Welcome page.
        if($this->pid > 0) {
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
