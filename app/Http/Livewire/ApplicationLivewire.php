<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Actions\MyAction;
use App\Models\MainSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\CardColorBackground;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Config;
use App\Models\MasterOnlyPlayerSetting;
use Illuminate\Database\Eloquent\Collection;

class ApplicationLivewire extends Component
{
    public $slideCount;
    // Settings
    public $showSystemJackpots;  
    public $showExternalJackpots;
    public $availablePages;

    // Application Initialization
    public $mac;
    public $MasterIP;
    public $DeviceID;
    public $pid;
    public $page;
    public $oldPage;
    public $title;

    public $isThisPageDefault;
    public $langStatus;
    public $slideStatus;
    public $cardBackgrounds;

    // Component / BackButton / 
    public $showComponent;
    public $showBack    = false;
    public $slideActive = true;
    /*========================*|
    ||  Header Values
    ||========================*/
    public $userName;
    public $userPoints;
    public $userCardColor;
    public $CardColorInt;

    /*========================*|
    ||  All pages
    ||========================*/
    public $Jackpots        = false;
    public $PersonalJackpot = false;
    public $AccountLevel    = false;
    public $Bonus           = false;
    public $Cashouts        = false;
    public $Settings        = false;
    public $ShowJackpot     = false;

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

    public $BonusShowCurrentBenefit;
    public $monthCollectedPoints;
    public $monthRedeemedPoints;
    public $totalPoints;
    public $dayCollectedPoints;
    public $dayRedeemedPoints;

    /*========================*| 
    ||  Cashouts
    ||========================*/
    public $cashoutValues;

    public $oldName;
    public $oldId;

    public function boot()
    {
        $this->MasterIp = DB::connection('mysql_main')->select("SELECT LmiPP.GetMasterIP() MasterIP")[0]->MasterIP;
        config(['database.connections.mysql_master.host' => $this->MasterIp]);
    }
    public function mount()
    {   
        // $mac="00:2e:15:00:14:82"; //premier 122
        // $mac="00:1b:eb:91:a9:3d"; //fructa 108
        $this->mac="00:1b:eb:91:a9:3d";
        
        // Example for caching 
        // if(! Cache::get('settings'))
        // {
        //     $appSettings = MainSetting::first();
        //     Cache::forever('settings', $appSettings);
        // }

        //     $this->appSettings = Cache::get('settings');

        // use MAC to get PID
        $getPID = DB::connection('mysql_main')->select("select LmiPP.MAC2PID('".$this->mac."') PID");
        $this->pid = $getPID[0]->PID;

        // use PID to get NAME
        $getName = DB::connection('mysql_main')->select("select lmi.GET_PLAYER_NAME('".$this->pid."') Name");
            $this->userName = $getName[0]->Name;

        // use PID to get CardColor
        $CardColor = DB::connection('mysql_main')->select("select lmi.GetPlayerMaxCard('".$this->pid."') CardColor");
            $this->userCardColor = $CardColor[0]->CardColor;

        //Card Int e levelul de card, pe care il pot folosi la schimbare de background de exemplu
        $CardColorInt = DB::connection('mysql_main')->select("select lmi.GetPlayerMaxCardInt('".$this->pid."') CardColorInt");
            $this->CardColorInt = $CardColorInt[0]->CardColorInt;
        $this->cardBackgrounds = CardColorBackground::find($this->CardColorInt);

        // Application Default Settings Logic 
        $appSettings    = MainSetting::first();
        $defaultPage = $appSettings->DefaultLandingPage;

        $defaultLanguage = $appSettings->DefaultLanguage;

        if($playerSettings = MasterOnlyPlayerSetting::on('mysql_master')->find($this->pid))
        {
            $defaultPage    = $playerSettings->LandingPage;
            $defaultLanguage = $playerSettings->CustomLanguage;
        }

        if(\Session::get('lang')) {
            \Session::forget('lang');
        }
        \Session::put('lang', $defaultLanguage);
        $this->langStatus             = $defaultLanguage;

        //Default Page data to be set (includeVar/title/page/selected)
        $this->$defaultPage = true;
        $this->title                = $defaultPage;
        $this->page                 = $defaultPage;
        $this->oldPage              = $defaultPage;
        $this->isThisPageDefault    = $defaultPage;
        $this->slideStatus          = $defaultPage;

        $this->showSystemJackpots     =  $appSettings->ShowSystemJackpots;  
        $this->showExternalJackpots   =  $appSettings->ShowExternalJackpots;
        $availablePages               =  $appSettings->AvailablePages;
        $this->availablePages         =  explode(",", $availablePages);
        $this->slideCount = count($this->availablePages);
        $this->BonusShowCurrentBenefit = $appSettings->BonusShowCurrentBenefit;
            
        // $this->func(new MyAction());
    }
    public function func(MyAction $param2)  {
        dump($param2->handle(1));
    }
    public function render()
    {
        if($this->oldId == null) {
            //logica pt external
            $this->jackpotValue = DB::connection('mysql_main')->select("call LmiPP.GetExternalJackpotsValues('$this->oldName', '10')");
        } else {
            //logica pt internal
            $this->jackpotValue = DB::connection('mysql_main')->select("call LmiPP.GetSystemJackpotsValues('$this->oldId', '10')");
        }

        //la schimbare cont
        //la 1 min
        // dd("sau asta");
        $getPoints = DB::connection('mysql_master')->select("select lmi.GetMasterOnlyB1Points('".$this->pid."') Points");
        $this->userPoints = $getPoints[0]->Points;
        // dd($this->userPoints);

        if($this->page == 'Cashouts') 
        {
            $getDeviceID =  DB::connection('mysql_main')->select("SELECT DeviceID FROM lmi.devices_last WHERE MAC='$this->mac'");
                $this->DeviceID= $getDeviceID[0]->DeviceID;

            $getCashouts= DB::connection('mysql_main')->select("SELECT Slot,FORMAT((Value/100),2) Value,Timestamp FROM lmi.Handpays WHERE DeviceID=$this->DeviceID ORDER BY `Timestamp` DESC LIMIT 10");
                $this->cashoutValues = $getCashouts;
        }
        if($this->page == 'Jackpots') 
        {
            $this->getExternalJackpots = DB::connection('mysql_main')->select("call LmiPP.GetSystemJackpotsNames");
            $this->getInternalJackpots = DB::connection('mysql_main')->select("call LmiPP.GetExternalJackpotsNames");
        }
        if($this->page == 'Bonus')
        {
            $currentBenefit = 'b'.$this->BonusShowCurrentBenefit;
            $getTotalPoints = DB::connection('mysql_master')->select("call LmiPP.MasterOnlyGetPlayerBenefits('$this->pid')");
            $this->totalPoints = $getTotalPoints[0]->$currentBenefit;

            $getDailyPoints = DB::connection('mysql_main')->select("call LmiPP.GetPlayerDailyBenefits('$this->pid')");
            $this->dayCollectedPoints = $getDailyPoints[0]->CD;
            $this->dayRedeemedPoints = $getDailyPoints[0]->RD;
            
            $getMonthlyPoints = DB::connection('mysql_main')->select("call LmiPP.GetPlayerMonthlyBenefits('$this->pid')");
            $this->monthCollectedPoints = $getMonthlyPoints[0]->CM;
            $this->monthRedeemedPoints  = $getMonthlyPoints[0]->RM;
        } 
       
        return view('livewire.application-livewire');
    }
    // Slide menu click action
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
    
            // $titleFormat becomes from AccountLevel = Account Level, puts a space before capital letter (but not first letter)
            $titleFormat = preg_replace('/([a-z])([A-Z])/s','$1 $2', $data);
            $this->title = $titleFormat;
            // $this->showBack = false;
        } else {
            $this->oldPage = $data;
        }
    }
    // Back button click action
    public function back()
    {
        $this->ShowJackpot = false;
        $this->showBack = false;
        $this->Jackpots = true;
        $this->page = 'Jackpots';
    }
    // Jackpots page click action to show individual ShowJackpot page
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
    public function languageStatus($status) 
    {
        \Session::forget('lang');
        \Session::put('lang', $status);
        $this->langStatus = $status;

        if($playerSettings = MasterOnlyPlayerSetting::on('mysql_master')->find($this->pid)) {
            $playerSettings->CustomLanguage = $status;
            $playerSettings->save();
        } else {
            $newPlayerSettings = new MasterOnlyPlayerSetting();
            $newPlayerSettings->setConnection('mysql_master');
            $newPlayerSettings->PlayerID = $this->pid;
            $newPlayerSettings->LandingPage = '';
            $newPlayerSettings->CustomLanguage = $status;
        };
    }
    public function slideStatus($status) 
    {
        $this->slideStatus = $status;

        if($playerSettings = MasterOnlyPlayerSetting::on('mysql_master')->find($this->pid)) {
            $playerSettings->LandingPage = $status;
            $playerSettings->save();
        } else {
            $newPlayerSettings = new MasterOnlyPlayerSetting();
            $newPlayerSettings->setConnection('mysql_master');
            $newPlayerSettings->PlayerID = $this->pid;
            $newPlayerSettings->LandingPage = $status;
            $newPlayerSettings->CustomLanguage = '';
        };
    }

    public function fire(){
        $someModel = new MasterOnlyPlayerSetting();

        $someModel->setConnection('mysql_master');

        $someModel->PlayerID = 2;

        $someModel->LandingPage = 'Jackpots';
        $someModel->CustomLanguage = 'En';
        $someModel->save();
        dd('done');
    }
    public function do() 
    {
        
    }
}