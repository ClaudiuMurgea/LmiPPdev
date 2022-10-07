<?php
     
namespace App\Http\Traits;
 
use App\Models\Setting;
 
trait GlobalTrait {
 
    public $globalMac;
    public function setMac($mac) 
    {
        // Fetch all the settings from the 'settings' table.
        $this->globalMac = $mac;
        return $this->globalMac;
    }
    public function getMac()
    {
        return $this->globalMac;
    }
}