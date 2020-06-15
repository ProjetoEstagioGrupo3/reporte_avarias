<?php

namespace App\Http\Controllers;

use App\TipoEquipamento;
use Illuminate\Http\Request;

class TipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipo=TipoEquipamento::paginate(5);
        $cr_ed=0;
        return view('Admin.Tipos.index')->with(compact('tipo','cr_ed'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Tipos.index');
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
            'tipoEquipamento' => 'required',
        ]);
        $data = $request->all();
        $tipo = new TipoEquipamento;
        $tipo->tipoEquipamento = $data['tipoEquipamento'];
        $tipo->save();
        return redirect('/Tipos')->with('fm-success', 'Registo criado com sucesso');
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
        $tipo=TipoEquipamento::paginate(5);
        $tipoedit =TipoEquipamento::findOrFail($id);
        $cr_ed=1;
        return view('Admin.Tipos.index')->with(compact('tipo','tipoedit','cr_ed'));
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
            'tipoEquipamento' => 'required',
        ]);
        
         $data = $request->all();
            TipoEquipamento::Where(['id'=>$id])->update([
                'tipoEquipamento' =>$data['tipoEquipamento'],
            ]);
        return redirect('/Tipos')->with('fm-success', 'Post alterado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TipoEquipamento::Where(['id'=>$id])->delete();
        return redirect('/Tipos')->with('fm-success', 'Post eliminado com sucesso');
    }
}
