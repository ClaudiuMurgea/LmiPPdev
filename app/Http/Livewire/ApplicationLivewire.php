<?php

namespace App\Http\Livewire;

use App\Models\Page;
use App\Models\Test;
use Livewire\Component;
use App\Models\Translate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Database\Eloquent\Collection;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ApplicationLivewire extends Component
{
    use LivewireAlert;

    public $page;
    public $titleExtra;
    public $langStatus;
    public $slideStatus;
    public $showComponent;
    public $showBack    = false;
    public $slideActive = true;
    public $title;
    public $menuArrow = false;
    public $arrowClicked = 1;
    
    // public $lang;
    /*========================*|
    ||  All pages
    ||========================*/
    public $jackpots        = false;
    public $personal        = false;
    public $showJackpot     = false;
    public $account         = false;
    public $bonus           = false;
    public $market          = false;
    public $cashout         = false;
    public $news            = false;
    public $okto            = false;
    public $pyramid         = false;
    public $quest           = false;
    public $tombola         = false;
    public $settings        = false;

    /*========================*| 
    ||  Page -- Cashout 
    ||========================*/
    public $content;
    public $property = [0];
    public $keyboard = false;
    public $message = false;
    public $searchTerm = "";
    /*========================*| 
    ||  Page -- ShowJackpot
    ||========================*/
    public $var = false;
    public $showAll = false;

    public $i = 0;

    protected $listeners = ['buy'];


    public function mount()
    {
        // \Session::forget('lang');
        \Session::put('lang', 'En');
        $this->title = 'Jackpots';
        $this->jackpots = true;
    }
    public function render()
    {
        // session(['lang' => $this->lang]);
        if(\Session::get('lang') == 'Ro') {
            $this->langStatus = 'Ro';
        } else {
            $this->langStatus = 'En';
        }

        $qr = '';
        $cashouts = '';
        $marketItems = '';
        if($this->page == 'cashout') 
        {
            //Cashout
            $mac = "00:1b:eb:54:74:44";
            $MasterIP=DB::connection('mysql_main')->select("select LmiPP.GetMasterIP() MasterIP")[0]->MasterIP;
            config(['database.connections.mysql_master.host' => $MasterIP]);
            $arrayToString = implode($this->property);
            $this->searchTerm = ltrim($arrayToString, '0');

            $cashouts = Page::where('MaxInactiveMin', 'like', '%' . $this->searchTerm . '%')->paginate(10);
        } 
        if($this->page == 'market')
        {   //Market
            $marketItems = Test::all();
        }
        if($this->page == 'okto')
        {
            $qr='{"merchantId":"SITM2202280707","classId":"01","operationId":"0600","other":{"merchantInfo":"clasic","extSysData":"2 00:1b:eb:96:6f:cc"}}';
        }
        
        return view('livewire.application-livewire', ['cashouts' => $cashouts, 'marketItems' => $marketItems, 'qr' => $qr]);
    }

    // Slide menu click action
    public function ShowComponent($data, $extra = null) 
    {
        $this->page = $data;

        $this->jackpots         = false;
        $this->account          = false;
        $this->bonus            = false;
        $this->market           = false;
        $this->cashout          = false;
        $this->news             = false;
        $this->okto             = false;
        $this->pyramid          = false;
        $this->quest            = false;
        $this->tombola          = false;
        $this->showJackpot      = false;
        $this->settings         = false;
        $this->personal         = false;


        $this->$data = true;
        $this->title = ucfirst($data);
        $this->titleExtra = $extra ?? '';
        $this->showBack = false;
    }
    // Back button click action
    public function back()
    {
        $this->showJackpot = false;
        $this->showBack = false;
        $this->jackpots = true;
        $this->titleExtra = '';
    }
    // Jackpots page click action to show individual ShowJackpot page
    public function showJackpot($jackpot)
    {
        $this->jackpots = false;
        $this->showJackpot = true;
        $this->jackpot = $jackpot;
        $this->title = "Jackpot";
        $this->titleExtra = $jackpot;
        $this->showBack = true;
    }

    public function keyboard($nr) 
    {
        if($nr == 'back') 
        {
           array_pop($this->property);

        } 
        elseif($nr == 'del')
        {
            $this->property = [0];
        } 
        else
        {
            if((count($this->property) < 10))
            {
                $this->property[] = $nr;
            } else {
                $this->message = "Maximum number of digits reached!";
            }
        }
    }
    public function showKeyboard()
    {
        $this->keyboard = true;
        $this->slideActive = false;
    }
    public function hideKeyboard()
    {
        $this->keyboard = false;
        $this->slideActive = true;
    }
    public function delete()
    {
        // $this->toDelete = $product;
        $this->confirm('Are you sure you want to buy this product?', [
            'showConfirmButton' => true,
            'confirmButtonText' => 'Yes',
            'showCancelButton' => true,
            'cancelButtonText' => 'Cancel',
            'position' => 'center',
            'timer' => '20000',
            'confirmButtonColor' => '#2C7BE5',
            'onConfirmed' => 'buy',
            'allowOutsideClick' => false,
        ]);
    }
    // Market
    // public function buy()
    // {
    //     dd('You bought it! Hurray!');
    //     // $this->toDelete->delete();
    // }
    public function languageStatus($status) 
    {
        \Session::forget('lang');
        \Session::put('lang', $status);
    }

    public function slideStatus($status) 
    {
        $this->slideStatus = $status;
    }
    public function Translate($Text)
    {
        if(request()->session()->has('Mapare')==false)
        {
            $ToateCuvintele=DB::connection('mysql_main')->select("select * from Translate.Translate");
            $Mapare=array();
            foreach($ToateCuvintele as $data) {
                $Mapare[$data->En]=$data->Ro;
            }
            session(['Mapare' => $Mapare]);
        }
        if(\Session::get('lang') == 'En') {
            return $Text;
        }

        $Mapare=request()->session()->get('Mapare');

        if(array_key_exists($Text,$Mapare)) {
            return $Mapare[$Text];
        }
        else
        {
            if(request()->session()->has("DB_TRANSLATE_REQUEST_$Text")==false)
            {
                try { 
                    if(DB::connection('mysql_main')->select("replace into Translate.Requests(Word) values ('$Text')"));
                    session(["DB_TRANSLATE_REQUEST_$Text" => "gata, am pus"]);
                } catch(\Illuminate\Database\QueryException $ex){ 
                    // Note any method of class PDOException can be called on $ex.
                }
            }
        }

        return $Text;
    }
    public function showHide() {
        $this->arrowClicked++;
        if($this->arrowClicked % 2 == 0) {
            $this->slideActive = true;
        } else {
            $this->slideActive = false;
        }
    }
}