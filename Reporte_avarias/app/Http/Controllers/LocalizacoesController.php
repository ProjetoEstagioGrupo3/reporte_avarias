<?php

namespace App\Http\Controllers;
use App\Localizacoes;
use Illuminate\Http\Request;

class LocalizacoesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locS=Localizacoes::paginate(5);
        $cr_ed=0;
        return view('Admin/Localizacoes/index')->with(compact('locS','cr_ed'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin/Localizacoes/index');
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
            'localizacao' => 'required',
        ]);
        $data = $request->all();
        $loc = new Localizacoes;
        $loc->localizacao = $data['localizacao'];
        $loc->save();
        return redirect('/Localizacoes')->with('fm-success', 'Registo criado com sucesso');
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
        $locS=Localizacoes::paginate(5);
        $loc_edit =Localizacoes::findOrFail($id);
        $cr_ed=1;
        return view('Admin/Localizacoes/index')->with(compact('locS','loc_edit','cr_ed'));
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
            'localizacao' => 'required',
        ]);
        
         $data = $request->all();
            Localizacoes::Where(['id'=>$id])->update([
                'localizacao' =>$data['localizacao'],
            ]);
        return redirect('/Localizacoes')->with('fm-success', 'Post alterado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Localizacoes::Where(['id'=>$id])->delete();
        return redirect('/Localizacoes')->with('fm-success', 'Post eliminado com sucesso');
    }
}
