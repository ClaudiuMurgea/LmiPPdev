<?php 

namespace App\Actions;
use Illuminate\Support\Facades\Cookie;

class GetMac {
    public function handle() 
    {
        // return response()->json([
        //     'message' => 'update' . $param]);
        // $currentURL = url()->full();
        // $mac = substr($currentURL, strpos($currentURL, "=") + 1);
        if(isset($_GET["MAC"])) {
            $mac = $_GET["MAC"];
            Cookie::queue('LmiMacNew', $mac, 2147483647);
            // session(['lmiMac' => $mac]);
            return $mac;
        }

    }
}
