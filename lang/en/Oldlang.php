<?php
use App\Models\Translate;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

if(request()->session()->has('Mapare')==false)
{
    $ToateCuvintele=DB::connection('mysql_main')->select("select * from Translate.Translate");
    $Mapare=array();
    foreach($ToateCuvintele as $data) {
        $Mapare[$data->En]=$data->Ro;
    }
    session(['Mapare' => $Mapare]);
}

function TransL8($Text)
{
    // if($Lang=="En") {
    //     return $Text;
    // }

    $Mapare=request()->session()->get('Mapare');

    if(array_key_exists($Text,$Mapare)) {
        return $Mapare[$Text];
    }
    else
    {
        if(request()->session()->has("DB_TRANSLATE_REQUEST_$Text")==false)
        {
            DB::connection('mysql_main')->select("replace into Translate.Requests(Word) values ('$Text')");
            session(["DB_TRANSLATE_REQUEST_$Text" => "gata, am pus"]);
        }
    }

    return $Text;
}

return [
    'test' => 'testus',
]
?>