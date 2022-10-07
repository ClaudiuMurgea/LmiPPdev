<?php 

namespace App\Actions;

class GetDevice {
    public function handle() 
    {
        // return response()->json([
        //     'message' => 'update' . $param]);
        // $currentURL = url()->full();
        // $mac = substr($currentURL, strpos($currentURL, "=") + 1);
        if(isset($_GET["id"])) {
            $id = $_GET["id"];
            // Cookie::queue('LmiMacNew', $mac, 2147483647);
            // session(['lmiMac' => $mac]);
            return $id;
        }
    }
}
