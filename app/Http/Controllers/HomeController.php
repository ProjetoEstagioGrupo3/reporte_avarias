<?php

namespace App\Http\Controllers;

use App\Tipo_Avaria;
use App\Estado;
use App\Localizacoes;
use App\Equipamentos;
use App\Registo_Avaria;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $registo = Registo_Avaria::paginate(5);
        $tipoavaria = Tipo_Avaria::all();
        $estado = Estado::all();
        $localizacoes = Localizacoes::all();
        $equip = Equipamentos::all();
        $cr_ed=0;
        return view('registo.index')->with(compact('registo', 'tipoavaria', 'estado', 'localizacoes', 'equip', 'cr_ed'));
    }

    public function create()
    {
        return view('registo.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipo_avaria' => 'required',
            'estado' => 'required',
            'localizacao' => 'required',
            'tipo_id' => 'required',
            'descricao' => 'required',
        ]);
        $data = $request->all();
        $registo = new Registo_Avaria;
        $registo->tipoAvarias_id = $data['tipo_avaria'];
        $registo->estado_id = $data['estado'];
        $registo->localizacao_id = $data['localizacao'];
        $registo->equipamentos_id = $data['tipo_id'];
        $registo->descricao = $data['descricao'];
        $registo->users_id = auth()->id();
        $registo->save();
        return redirect('/home')->with('fm-success', 'Registo criado com sucesso');
    }

    public function edit($id)
    {
        $tipoavaria = Tipo_Avaria::all();
        $estado = Estado::all();
        $localizacoes = Localizacoes::all();
        $equip = Equipamentos::all();
        $registo_edit =Registo_avaria::findOrFail($id);
        $cr_ed=1;
        return view('registo.index')->with(compact('tipoavaria','estado', 'localizacoes', 'equip','registo_edit','cr_ed'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'localizacao' => 'required',
        ]);
        
         $data = $request->all();
            Localizacoes::Where(['id'=>$id])->update([
                'localizacao' =>$data['localizacao'],
            ]);
        return redirect('/home')->with('fm-success', 'Post alterado com sucesso');
    }

    public function destroy($id)
    {
        Registo_Avaria::Where(['id'=>$id])->delete();
        return redirect('/home')->with('fm-success', 'Quarto apagado com sucesso!');
    }
}
