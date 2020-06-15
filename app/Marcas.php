<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marcas extends Model
{
    protected $fillable = [
        'marca','created_at','update_at'
    ];
    
    public function Equipamentos()
    {
        return $this->hasMany(Equipamentos::class);
    }
}
