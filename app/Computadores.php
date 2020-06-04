<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Computadores extends Model
{
    protected $fillable = [
        'macaddress','sistemaOperativo','ram','created_at','update_at'
    ];
    
    public function Equipamentos()
    {
        return $this->belongsTo(Equipamentos::class);
    }
}
