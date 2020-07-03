<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccessPoints extends Model
{
    protected $fillable = [
        'codSwitch_id','equipamentos_id','nrPortaSwitch','nrTomadaRede','created_at','update_at'
    ];
    
    public function Equipamentos()
    {
        return $this->hasOne(Equipamentos::class,'accesspoints_id','nrPortaSwitch');
    }
    public function Switchs()
    {
        return $this->belongsTo(Switchs::class,'codSwitch_id');
    }
}
