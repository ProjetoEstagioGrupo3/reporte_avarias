<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bastidores extends Model
{
    protected $fillable = [
        'codBastidor','created_at','update_at'
    ];
    
    public function Equipamentos()
    {
        return $this->belongsTo(Equipamentos::class);
    }
}
