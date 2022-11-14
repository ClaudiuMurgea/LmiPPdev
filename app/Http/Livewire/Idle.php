<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\MainSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
// use Illuminate\Support\Facades\Cookie;
class Idle extends Component
{
    public $idle = true;
    public $lang;
    public $mac;
    public $deviceID;
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

        // Setting the 'lang' variable to be the application default language
        $appSettings        = MainSetting::on('mysql_main')->first();
        $this->lang         = $appSettings->DefaultLanguage;
    }
    public function render()
    {
            //Query the DB for 'PID' every 5 seconds (To check if the user card is scanned)
            $getPID = DB::connection('mysql_main')->select("select LmiPP.MAC2PID('".$this->mac."') PID");
            $activePID = $getPID[0]->PID;

            // If the activePID is greater than 0, it means that a user scanned he's card and, the application will redirect him to the application main URL (User Mode)
            if($activePID > 0) 
            {
                redirect("/?MAC=". $this->mac);
            }
            try {
                $getDeviceID =  DB::connection('mysql_main')->select("SELECT DeviceID FROM lmi.devices_last WHERE MAC='$this->mac'");

                if(sizeof($getDeviceID) > 0)
                {
                    $DeviceID = $getDeviceID[0]->DeviceID;
                }
                else 
                {
                // If the MAC is not recieved from the URL, the whole application is closed and a custom error is displayed
                    dump('                                     Interface is not registered!                                     ');
                    abort(404);
                }

            } catch (\Illuminate\Database\QueryException $e) {
                return $e->getMessage();
            }

        return view('livewire.idle', ['activePID' => $activePID]);
    }

    // When the user taps the screen, the application will redirect him to the interactive pages URL
    public function showIdlePages() {
        return redirect("interactive-idle?MAC=" . $this->mac);
    }
}
