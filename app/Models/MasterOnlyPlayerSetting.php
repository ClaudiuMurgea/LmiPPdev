<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterOnlyPlayerSetting extends Model
{
    protected $connection = 'mysql_master';
    protected $primaryKey = 'PlayerID';
    protected $table = 'LmiPP.MasterOnlyPlayerSettings';
    protected $fillable = ['PlayerID', 'LandingPage', 'CustomLanguage'];
    public $timestamps = false;
}
