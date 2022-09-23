<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MainSetting extends Model
{
    protected $connection = 'mysql_main';

    protected $primaryKey = 'ID';
    protected $table = 'LmiPP.MainSettings';

    public $timestamps = false;
}
