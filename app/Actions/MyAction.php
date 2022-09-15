<?php 

namespace App\Actions;
class MyAction {
    public function handle($param) 
    {
        return response()->json([
            'message' => 'update' . $param]);
    }
}
