<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoEquipamento extends Model
{
    protected $fillable = [
        'tipoEqipamento','created_at','update_at'
    ];
    public function Equipamentos()
    {
        return $this->hasMany(Equipamentos::class,'tipo_id','tipoEqipamento');
    }
}
