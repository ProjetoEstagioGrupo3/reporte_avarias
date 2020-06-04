<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipamentos extends Model
{
    protected $fillable = [
        'Descricao','id_localizacao','id_marca','tipoequipamento','created_at','update_at'
    ];
    
    public function Computadores()
    {
        return $this->belongsTo(Computadores::class);
    }
    public function Projetores()
    {
        return $this->belongsTo(Projetores::class);
    }
    public function Switchs()
    {
        return $this->belongsTo(Switchs::class);
    }
    public function Bastidores()
    {
        return $this->belongsTo(Bastidores::class);
    }
    public function AccessPoits()
    {
        return $this->belongsTo(AccessPoits::class);
    }
    public function TipoEquipamento()
    {
        return $this->belongsTo(TipoEquipamento::class);
    }
    public function Marcas()
    {
        return $this->belongsTo(Marcas::class);
    }
    public function Localizacoes()
    {
        return $this->belongsTo(Localizacoes::class);
    }
}
