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
        return $this->hasOne(Computadores::class,'computadores_id');
    }
    public function Projetores()
    {
        return $this->hasOne(Projetores::class,'projetores_id');
    }
    public function Switchs()
    {
        return $this->hasOne(Switchs::class,'switchs_id');
    }
    public function Bastidores()
    {
        return $this->hasOne(Bastidores::class,'bastidores_id');
    }
    public function AccessPoits()
    {
        return $this->hasOne(AccessPoits::class,'accesspoints_id');
    }
    public function TipoEquipamento()
    {
        return $this->belongsTo(TipoEquipamento::class,'tipo_id');
    }
    public function Marcas()
    {
        return $this->belongsTo(Marcas::class,'marca_id');
    }
    public function Localizacoes()
    {
        return $this->belongsTo(Localizacoes::class,'localizacao_id');
    }
}
