<?php

namespace App\Http\Controllers;
use App\Equipamentos;
use App\Localizacoes;
use App\Marcas;
use App\TipoEquipamento;
use App\Computadores;
use App\Projetores;
use App\Bastidores;
use App\Switchs;
use App\AccessPoints;
use Illuminate\Http\Request;

class EstatisticasController extends Controller
{
    public function index(){
        $equipamentos=Equipamentos::paginate(5);
        $localizacoes=Localizacoes::all();
        $marcas=Marcas::all();
        $tipos=TipoEquipamento::all();
        $pcs=Computadores::all();
        $projs=Projetores::all();
        $basts=Bastidores::all();
        $switchs=Switchs::all();
        $accesps=AccessPoints::all();
        return view('Admin.Estatisticas.view1')->with(compact('equipamentos','localizacoes', 'marcas','tipos','pcs','projs','basts','switchs','accesps'));
    }
}
