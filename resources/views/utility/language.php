<?php
    if(request()->session()->has('Mapare')==false)
    {
        $ToateCuvintele=DB::connection('mysql_main')->select("select * from Translate.Translate");
        $Mapare=array();
        foreach($ToateCuvintele as $data) {
            $Mapare[$data->En]=$data->Ro;
        }
        session(['Mapare' => $Mapare]);
    }
    function Translate($Text,$ForcedLang="")
    {
        $Lang=\Session::get('lang');

        if($ForcedLang!="")
        {
            $Lang=$ForcedLang;
        }
        if($Lang == 'En')
        {
            return $Text;
        }

        // $Mapare=\Session::get('Mapare');
        $Mapare=request()->session()->get('Mapare');

        if(array_key_exists($Text,$Mapare)) {
            return $Mapare[$Text];
        }
        else
        {
            try { 
                DB::connection('mysql_main')->select("replace into Translate.Requests(Word) values ('$Text')");
                session(["DB_TRANSLATE_REQUEST_$Text" => "gata, am pus"]);
            } catch(\Illuminate\Database\QueryException $ex){ 
                // Note any method of class PDOException can be called on $ex.
            }
        }

        return $Text;
    }
?>