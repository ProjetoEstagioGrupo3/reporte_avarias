<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoEquipamento extends Model
{
    public function Equipamentos()
    {
        return $this->hasMany(Equipamentos::class);
    }
}
