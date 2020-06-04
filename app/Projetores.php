<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projetores extends Model
{
    protected $fillable = [
        'tipoProjetor','modeloProjetor','created_at','update_at'
    ];
    
    public function Equipamentos()
    {
        return $this->belongsTo(Equipamentos::class);
    }
}
