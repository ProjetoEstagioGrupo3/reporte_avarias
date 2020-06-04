<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Switchs extends Model
{
    protected $fillable = [
        'codBastidor','created_at','update_at'
    ];
    
    public function Equipamentos()
    {
        return $this->belongsTo(Equipamentos::class);
    }
}
