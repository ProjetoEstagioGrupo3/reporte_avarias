<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Computadores extends Model
{
    protected $fillable = [
        'macaddress','equipamento_id','sistemaOperativo','ram','created_at','update_at'
    ];
    
    public function Equipamentos()
    {
        return $this->hasOne(Equipamentos::class,'computadores_id','macaddress');
    }
}
