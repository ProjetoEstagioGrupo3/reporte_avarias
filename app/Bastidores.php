<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bastidores extends Model
{
    protected $fillable = [
        'codBastidor','equipamentos_id','created_at','update_at'
    ];
    
    public function Equipamentos()
    {
        return $this->hasOne(Equipamentos::class);
    }
}
