<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Switchs extends Model
{
    protected $fillable = [
        'codbastidor_id','codSwitch','nrTotalPortas','equipamentos_id','created_at','update_at'
    ];
    
    public function Equipamentos()
    {
        return $this->hasOne(Equipamentos::class,'switchs_id','codSwitch');
    }
    public function Bastidores()
    {
        return $this->belongsTo(Bastidores::class,'codbastidor_id');
    }

    public function AccessPoints()
    {
        return $this->hasMany(AccessPoints::class,'codSwitch_id','codSwitch');
    }
}
