<?php

namespace App\Http\Controllers;

use App\Tipo_Avaria;
use Illuminate\Http\Request;

class TipoAvariasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tpavaria=Tipo_Avaria::paginate(5);
        $cr_ed=0;
        return view('Admin.TipoAvarias.index')->with(compact('tpavaria','cr_ed'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.TipoAvarias.index');
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
            'tipo_avaria' => 'required',
        ]);
        $data = $request->all();
        $tpavaria = new Tipo_Avaria;
        $tpavaria->tipo_avaria = $data['tipo_avaria'];
        $tpavaria->descricao = $data['descricao'];
        $tpavaria->save();
        return redirect('/TipoAvarias')->with('fm-success', 'Registo criado com sucesso');
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
        $tpavaria=Tipo_Avaria::paginate(5);
        $tpavariaedit =Tipo_Avaria::findOrFail($id);
        $cr_ed=1;
        return view('Admin.TipoAvarias.index')->with(compact('tpavaria','tpavariaedit','cr_ed'));
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
            'tipo_avaria' => 'required',
        ]);
        
         $data = $request->all();
         Tipo_Avaria::Where(['id'=>$id])->update([
                'tipo_avaria' =>$data['tipo_avaria'],
                'descricao' =>$data['descricao'],
            ]);
        return redirect('/TipoAvarias')->with('fm-success', 'Post alterado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tipo_Avaria::Where(['id'=>$id])->delete();
        return redirect('/TipoAvarias')->with('fm-success', 'Post eliminado com sucesso');
    }
}
