<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Localizacoes extends Model
{
    protected $fillable = [
        'localizacao','created_at','update_at'
    ];
    
    public function Equipamentos()
    {
        return $this->hasMany(Equipamentos::class,'localizacao_id','localizacao');
    }
}
