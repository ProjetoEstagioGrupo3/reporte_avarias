<?php

namespace App\Http\Controllers;

use App\Marcas;
use Illuminate\Http\Request;

class MarcasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marca=Marcas::paginate(5);
        $cr_ed=0;
        return view('Admin.Marcas.index')->with(compact('marca','cr_ed'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Marcas.index');
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
            'marca' => 'required',
        ]);
        $data = $request->all();
        $marca = new Marcas;
        $marca->marca = $data['marca'];
        $marca->save();
        return redirect('/Marcas')->with('fm-success', 'Registo criado com sucesso');
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
        $marca=Marcas::paginate(5);
        $marcaedit =Marcas::findOrFail($id);
        $cr_ed=1;
        return view('Admin.Marcas.index')->with(compact('marca','marcaedit','cr_ed'));
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
            'marca' => 'required',
        ]);
        
         $data = $request->all();
         Marcas::Where(['id'=>$id])->update([
                'marca' =>$data['marca'],
            ]);
        return redirect('/Marcas')->with('fm-success', 'Post alterado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Marcas::Where(['id'=>$id])->delete();
        return redirect('/Marcas')->with('fm-success', 'Post eliminado com sucesso');
    }
}
