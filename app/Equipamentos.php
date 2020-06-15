<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipamentos extends Model
{
    protected $fillable = [
        'descricao','localizacao_id','marca_id','tipoequipamento_id','computadores_id','tipo_id','accesspoints_id','bastidores_id','switchs_id','projetores_id','created_at','update_at'
    ];
    
    public function Computadores()
    {
        return $this->hasOne(Computadores::class);
    }
    public function Projetores()
    {
        return $this->hasOne(Projetores::class);
    }
    public function Switchs()
    {
        return $this->hasOne(Switchs::class);
    }
    public function Bastidores()
    {
        return $this->hasOne(Bastidores::class);
    }
    public function AccessPoits()
    {
        return $this->hasOne(AccessPoits::class);
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
