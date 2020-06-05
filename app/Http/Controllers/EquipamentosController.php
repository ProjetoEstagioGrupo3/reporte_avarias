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
        $equipamentos=Equipamentos::all();
        return view('Admin.Equipamentos.index');
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
        $equipamentos->id_localizacao = $data['localizacao'];
        $equipamentos->id_marca = $data['marca'];
        $equipamentos->tipoEquipamento = $data['tipoEquipamento'];
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
                'id_localizacao' =>$data['id_localizacao'],
                'id_marca' =>$data['id_marca'],
                'tipoEquipamento' =>$data['tipoEquipamento'],
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
        Equipamentos::findOrFail($id)->delete();
        return redirect (route('/Equipamentos'))->with('fm-success','post eliminada com sucesso');
    }
}
