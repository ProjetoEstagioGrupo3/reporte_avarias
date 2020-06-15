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
        return $this->hasOne(Equipamentos::class);
    }
}
