<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\MainSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\CardColorBackground;
use Illuminate\Support\Facades\Config;
use App\Models\MasterOnlyPlayerSetting;
// use Illuminate\Support\Facades\Cookie;
use Illuminate\Database\Eloquent\Collection;
class ApplicationLivewire extends Component
{
    // Settings
    public $slideCount;
    public $availablePages;
    public $showSystemJackpots;  
    public $showExternalJackpots;

    public $nameAnimation = false;

    // Application Initialization
    public $mac;
    public $pid;
    public $title;
    public $page;
    public $oldPage;
    public $isThisPageDefault;
    public $MasterIP = "";
    public $DeviceID;
    public $langStatus;
    public $slideStatus;
    public $cardBackgrounds;

    // Component / BackButton / 
    public $showComponent;
    public $slideActive = true;
    public $showBack    = false;

    /*========================*|
    ||  Header Values
    ||========================*/
    public $userName;
    public $userPoints;
    public $CardColorInt;
    public $userCardColor;

    /*========================*|
    ||  All pages
    ||========================*/
    public $Bonus           = false;
    public $Cashouts        = false;
    public $Settings        = false;
    public $Jackpots        = false;
    public $ShowJackpot     = false;
    public $AccountLevel    = false;
    public $PersonalJackpot = false;

    /*========================*|
    ||  Jackpots
    ||========================*/
    public $jackpotTitle;
    public $jackpotValue;
    public $getExternalJackpots;
    public $getInternalJackpots;

    /*========================*|
    ||  Bonus
    ||========================*/
    public $totalPoints;
    public $dayRedeemedPoints;
    public $dayCollectedPoints;
    public $monthRedeemedPoints;
    public $monthCollectedPoints;
    public $BonusShowCurrentBenefit;

    /*========================*| 
    ||  Cashouts
    ||========================*/
    public $oldId;
    public $oldName;
    public $cashoutValues;
    public $showReturn = false;
    public function boot()
    {
        // $mac="00:2e:15:00:14:82"; //premier 122
        // $mac="00:f4:ac:68:50:4e"; //fructa 108
        // pt .38 macul -> 00:1b:eb:91:85:72 PlayerCardID 1560248085 sau 0

        \Session::forget('Mapare');
        $this->MasterIp = DB::connection('mysql_main')->select("SELECT LmiPP.GetMasterIP() MasterIP")[0]->MasterIP;
        config(['database.connections.mysql_master.host' => $this->MasterIp]);
    }
    public function mount()
    {   
        // Getting the MAC from the URL (Vital action when the LMI APP is opened)
        if(isset($_GET["MAC"]))
        {
            $this->mac = $_GET["MAC"];
        } else {
        // If the MAC is not recieved from the URL, the whole application is closed and a custom error is displayed
            dump('                                            MAC is incorrect                                            ');
            abort(404);
        }
        if(config('database.mac') == ""){
            config(['database.mac' => $this->mac]);
        }
        // Saving the mac inside a cookie if the cookie is not set (The cookie is used inside 'app/Http/Controllers/PidController.php')
        // if(!Cookie::get('LmiMacNew')){
        //     Cookie::queue('LmiMacNew', $this->mac, 2147483647);
        //     // cookie()->queue("loginToken", $loginToken, 60*24*365*10, null, null, null, true, false, 'None');
        // }
        

        // DeviceID is used for Cashouts page
        $getDeviceID =  DB::connection('mysql_main')->select("SELECT DeviceID FROM lmi.devices_last WHERE MAC='$this->mac'");
        if(sizeof($getDeviceID) > 0)
        {
            $this->DeviceID = $getDeviceID[0]->DeviceID;
        }
        else 
        {
        // If the MAC is not recieved from the URL, the whole application is closed and a custom error is displayed
            dump('                                     Interface is not registered!                                     ');
            abort(404);
        }
        
        // use MAC to get PID (if it fails, the error is contained)
        try {
            $getPID = DB::connection('mysql_main')->select("select LmiPP.MAC2PID('".$this->mac."') PID");
                $this->pid = $getPID[0]->PID;
        } catch (\Illuminate\Database\QueryException $e) {
            return $e->getMessage();
        }
       
        // Example for caching 
        // if(! Cache::get('settings'))
        // {
        //     $appSettings = MainSetting::first();
        //     Cache::forever('settings', $appSettings);
        // }

        //     $this->appSettings = Cache::get('settings');

        // use PID to get the user name (only two names will be displayed)
        $getName = DB::connection('mysql_main')->select("select lmi.GET_PLAYER_NAME('".$this->pid."') Name");
            $this->userName = explode(" ",$getName[0]->Name);
        if(strlen($getName[0]->Name) > 18)
        {
            $this->nameAnimation = true;
        }
        // use PID to get CardColor (The card name that is displayed in the header next to points)
        $CardColor = DB::connection('mysql_main')->select("select lmi.GetPlayerMaxCard('".$this->pid."') CardColor");
            $this->userCardColor = $CardColor[0]->CardColor;

        //Card Int e levelul de card, pe care il pot folosi la schimbare de background de exemplu
        $CardColorInt = DB::connection('mysql_main')->select("select lmi.GetPlayerMaxCardInt('".$this->pid."') CardColorInt");
            $this->CardColorInt = $CardColorInt[0]->CardColorInt;

            $this->cardBackgrounds = CardColorBackground::find($this->CardColorInt);

        // Application default settings logic 
        // MainSetting             || is the model that retrieves data related to the application default settings.
        // MasterOnlyPlayerSetting || is the model that retrieves data related to the user custom settings.
        // In absence of user custom settings, the application default settings will be used. 
        // if the user has custom settings recorded based on the user ID in the database, the settings are overwritten.
        $appSettings         = MainSetting::on('mysql_main')->first();
        $defaultPage         = $appSettings->DefaultLandingPage;
        $defaultLanguage     = $appSettings->DefaultLanguage;
        $idleLanguage        = $appSettings->DefaultLanguage;
        if($this->pid) {
            //Checking if the user has custom settings in the database
            $playerSettings      = MasterOnlyPlayerSetting::on('mysql_master')->find($this->pid);
            if($playerSettings != null) {
                // Overwriting the settings
                if($playerSettings->LandingPage != "")
                {
                    $defaultPage     = $playerSettings->LandingPage;
                }
                if($playerSettings->CustomLanguage != "")
                {
                    $defaultLanguage = $playerSettings->CustomLanguage;
                }
            }
        }
        // Saving the user (if exists) or app language settings.
        if(\Session::get('lang') == null) {
            \Session::forget('lang');
        } 
        \Session::put('lang', $defaultLanguage);
        
        // Saving app language settings only for idle page (the user doesn't decide the language on idle).
        if(\Session::get('idleLang') == null) {
            \Session::forget('idleLang');
        } 
        \Session::put('idleLang', $idleLanguage);
        $this->langStatus               = $defaultLanguage;
        $this->slideStatus              = $defaultPage;

        //Default Page data to be set (includeVar/title/page/selected)
        $trimmedString = str_replace(' ', '', $defaultPage);
        $this->$trimmedString = true;
        $this->title                    = $defaultPage;

        switch($defaultPage) {
            case 'Personal Jackpot':
                $this->title = 'Personal JP';
                break;
            case 'Account Level':
                $this->title = 'Level';
        }

        $camelDefaultPage               = str_replace(' ', '', $defaultPage);
        $this->page                     = $camelDefaultPage;
        $this->oldPage                  = $camelDefaultPage;
        $this->isThisPageDefault        = $camelDefaultPage;

        $this->showSystemJackpots       = $appSettings->ShowSystemJackpots;  
        $this->showExternalJackpots     = $appSettings->ShowExternalJackpots;
        $availablePages                 = $appSettings->AvailablePages;
        $this->availablePages           = explode(",", $availablePages);
        $this->slideCount               = count($this->availablePages);
        $this->BonusShowCurrentBenefit  = $appSettings->BonusShowCurrentBenefit;
    }
    public function render()
    {
        //ShowJackpot page persists even if the application keeps refreshing, saving the disired jackpot that the user clicked on as OldName or oldId
        if($this->oldId == null) {
            //logica pt external
            $this->jackpotValue = DB::connection('mysql_main')->select("call LmiPP.GetExternalJackpotsValues('$this->oldName', '10')");
        } else {
            //logica pt internal
            $this->jackpotValue = DB::connection('mysql_main')->select("call LmiPP.GetSystemJackpotsValues('$this->oldId', '10')");
        }

        // Fetching user points from the master server
        $getPoints        = DB::connection('mysql_master')->select("select lmi.GetMasterOnlyB1Points('".$this->pid."') Points");
        $this->userPoints = $getPoints[0]->Points;
        $this->userPoints = number_format(intval($this->userPoints), 0, ',', '.');

        // If the user is on Cashouts page, query the database for the $cashoutValues
        if($this->page == 'Cashouts') 
        {
            // $getCashouts = DB::connection('mysql_main')->select("SELECT Slot,FORMAT((Value/100),2) Value,Timestamp FROM lmi.Handpays WHERE DeviceID=$this->DeviceID ORDER BY `Timestamp` DESC LIMIT 8");
            //     $this->cashoutValues = $getCashouts;
            $getSlot = DB::connection('mysql_main')->select("select lmi.Device2Slot('".$this->DeviceID."') Slot");
            $slot = $getSlot[0]->Slot;
            $this->cashoutValues = DB::connection('mysql_main')->select("call lmi.GetHandpaysAndTito('$slot', '9')");
        }

        // If the user is on Jackpots page, query the database for system and external jackpots
        if($this->page == 'Jackpots') 
        {
            $this->getExternalJackpots = DB::connection('mysql_main')->select("call LmiPP.GetSystemJackpotsNames");
            $this->getInternalJackpots = DB::connection('mysql_main')->select("call LmiPP.GetExternalJackpotsNames");
        }
        // If the user is on Bonus page, query the database
        if($this->page == 'Bonus')
        {
            $currentBenefit                 = 'b'.$this->BonusShowCurrentBenefit;
            $getTotalPoints                 = DB::connection('mysql_master')->select("call LmiPP.MasterOnlyGetPlayerBenefits('$this->pid')");
                $this->totalPoints          = $getTotalPoints[0]->$currentBenefit;

            $getDailyPoints                 = DB::connection('mysql_main')->select("call LmiPP.GetPlayerDailyBenefits('$this->pid')");
                $this->dayCollectedPoints   = $getDailyPoints[0]->CD;
                $this->dayRedeemedPoints    = $getDailyPoints[0]->RD;
            
            $getMonthlyPoints               = DB::connection('mysql_main')->select("call LmiPP.GetPlayerMonthlyBenefits('$this->pid')");
                $this->monthCollectedPoints = $getMonthlyPoints[0]->CM;
                $this->monthRedeemedPoints  = $getMonthlyPoints[0]->RM;
        } 

        return view('livewire.application-livewire');
    }

    // When the user clicks on one slide-menu icon, this function is triggered
    public function ShowComponent($data) 
    {
        if($this->oldPage != $data)
        {
            $this->Jackpots         = false;
            $this->AccountLevel     = false;
            $this->Bonus            = false;
            $this->Cashouts         = false;
            $this->Settings         = false;
            $this->PersonalJackpot  = false;
            $this->ShowJackpot      = false;
            
            $this->$data    = true;
            $this->page     = $data;
            $this->oldPage  = $data;
    
            // $titleFormat becomes from AccountLevel = Account Level, puts a space before a capital letter (but not first letter)
            $titleFormat = preg_replace('/([a-z])([A-Z])/s','$1 $2', $data);
            $this->title = $titleFormat;
            switch($titleFormat) {
                case 'Personal Jackpot':
                    $this->title = 'Personal JP';
                    break;
                case 'Account Level':
                    $this->title = 'Level';
            }
        } else {
            $this->oldPage = $data;
        }
        $this->showBack = false;
    }
    // When the user clicks on one jackpot on the Jackpots page, the back button appears, that back button triggers this function
    public function back()
    {
        $this->ShowJackpot = false;
        $this->showBack    = false;
        $this->Jackpots    = true;
        $this->page        = 'Jackpots';
    }
    // When the user clicks on one jackpot on the Jackpots page, that click event triggers this function
    public function showJackpot($name, $id = null)
    {
        $this->Jackpots     = false;
        $this->ShowJackpot  = true;
        $this->jackpotTitle = ucfirst($name);
        $this->showBack     = true;
        $this->page         = 'ShowJackpot';
        $this->oldPage      = 'ShowJackpot';

        $this->oldName      = $name;
        $this->oldId        = $id;
        if($id == null) {
            //logica pt external
            $this->jackpotValue = DB::connection('mysql_main')->select("call LmiPP.GetExternalJackpotsValues('$name', '10')");
            // $str="";
            // foreach($this->jackpotValue[0] as $key => $val)
            //     $str.="$key ";
            // dd($str);
        } else {
            //logica pt internal
            $this->jackpotValue = DB::connection('mysql_main')->select("call LmiPP.GetSystemJackpotsValues('$id', '10')");
        }
    }
    
    //This function is triggered when the user clicks on the flag icons on Settings page. 
    public function languageStatus($status) 
    {
        //Deletes previous session language variable and remakes it
        \Session::forget('lang');
        \Session::put('lang', $status);

        // Highlights the flag that the user clicked on
        $this->langStatus = \Session::get('lang');

        //Updates if the user has custom settings in the database, or creates new settings for that user.
        $playerSettings = MasterOnlyPlayerSetting::on('mysql_master')->find($this->pid);
        if($playerSettings) {
            $playerSettings->CustomLanguage = $status;
            $playerSettings->save();
        } else {
            $newPlayerSettings = new MasterOnlyPlayerSetting();
            $newPlayerSettings->setConnection('mysql_master');
            $newPlayerSettings->PlayerID = $this->pid;
            $newPlayerSettings->LandingPage = '';
            $newPlayerSettings->CustomLanguage = $status;
            $newPlayerSettings->save();
        }
    }

    //This function is triggered when the user clicks on the slide-menu icons on Settings page. 
    public function slideStatus($status) 
    {
        // Highlights the slide-menu icon that the user clicked on
        $this->slideStatus = $status;

        //Updates if the user has custom settings in the database, or creates new settings for that user.
        $playerSettings = MasterOnlyPlayerSetting::on('mysql_master')->find($this->pid);
        if($playerSettings) {
            $playerSettings->LandingPage = $status;
            $playerSettings->save();
        } else {
            $newPlayerSettings = new MasterOnlyPlayerSetting();
            $newPlayerSettings->setConnection('mysql_master');
            $newPlayerSettings->PlayerID = $this->pid;
            $newPlayerSettings->LandingPage = $status;
            $newPlayerSettings->CustomLanguage = '';
            $newPlayerSettings->save();
        };
    }
}