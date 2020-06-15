<?php

namespace App\Http\Controllers;

use App\Equipamentos;
use App\Localizacoes;
use App\Marcas;
use App\TipoEquipamento;
use Illuminate\Http\Request;

class EquipamentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipamentos=Equipamentos::paginate(5);
        $localizacoes=Localizacoes::all();
        $marcas=Marcas::all();
        $tipos=TipoEquipamento::all();
        $cr_ed=0;
        return view('Admin.Equipamentos.index')->with(compact('equipamentos', 'cr_ed','localizacoes', 'marcas','tipos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $localizacoes=Localizacoes::all();
        $marcas=Marcas::all();
        $tipos=TipoEquipamento::all();
        return view('Admin.Equipamentos.index')->with(compact('localizacoes', 'marcas', 'tipos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'descricao' => 'required',
            'localizacao' => 'required',
            'marca' => 'required',
            'tipoEquipamento' => 'required',
        ]);
        $data = $request->all();
        $equipamentos = new Equipamentos();
        $equipamentos->descricao = $data['descricao'];
        $equipamentos->localizacao_id = $data['localizacao'];
        $equipamentos->marca_id = $data['marca'];
        $equipamentos->tipo_id = $data['tipoEquipamento'];
        $equipamentos->save();
        return redirect('/Equipamentos')->with('fm-success', 'Registo criado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $equipamentos=Equipamentos::paginate(5);
        $equipedit =Equipamentos::findOrFail($id);
        $localizacoes=Localizacoes::all();
        $marcas=Marcas::all();
        $tipos=TipoEquipamento::all();
        $cr_ed=1;
        return view('Admin.Equipamentos.index')->with(compact('equipamentos','equipedit','cr_ed','localizacoes', 'marcas', 'tipos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'descricao' => 'required',
            'localizacao' => 'required',
            'marca' => 'required',
            'tipoEquipamento' => 'required',
        ]);
        
         $data = $request->all();
            Equipamentos::Where(['id'=>$id])->update([
                'descricao' =>$data['descricao'],
                'localizacao_id' =>$data['localizacao_id'],
                'marca_id' =>$data['marca_id'],
                'tipo_id' =>$data['tipo_id'],
            ]);
        return redirect('/Equipamentos')->with('fm-success', 'Post alterado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Equipamentos::Where(['id'=>$id])->delete();
        return redirect('/Equipamentos')->with('fm-success', 'Post eliminado com sucesso');
    }
}
