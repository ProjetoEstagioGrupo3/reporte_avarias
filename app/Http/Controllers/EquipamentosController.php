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
        $pcs=Computadores::all();
        $projs=Projetores::all();
        $basts=Bastidores::all();
        $switch=Switchs::all();
        $accesp=AccessPoints::all();
        $cr_ed=0;
        return view('Admin.Equipamentos.index')->with(compact('equipamentos', 'cr_ed','localizacoes', 'marcas','tipos','pcs','projs','basts','switch','accesp'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $qual=$request->get('tipoEquipamento');
        if($qual==1){
            $request->validate([
                'descricao' => 'required',
                'localizacao' => 'required',
                'marca' => 'required',
                'macaddress' => 'required',
                'sistemaOperativo' => 'required',
                'ram' => 'required',
            ]);
            $data = $request->all();

            $equipamentos = new Equipamentos();
            $computadores= new Computadores();

            $equipamentos->descricao = $data['descricao'];
            $equipamentos->localizacao_id = $data['localizacao'];
            $equipamentos->marca_id = $data['marca'];
            $equipamentos->tipo_id = $data['tipoEquipamento'];
            $equipamentos->save();
    
            $equipamentos_id=$equipamentos->id;

            $computadores->macaddress = $data['macaddress'];
            $computadores->sistemaOperativo = $data['sistemaOperativo'];
            $computadores->ram = $data['ram'];
            $computadores->equipamento_id=$equipamentos_id;
            $computadores->save();

            $equipamentos->computadores_id=$computadores->id;
            $equipamentos->save();
        }
        elseif($qual==2){
            $request->validate([
                'descricao' => 'required',
                'localizacao' => 'required',
                'marca' => 'required',
                'tipoProjetor' => 'required',
                'modeloProjetor' => 'required',
            ]);
             $data = $request->all();
            $equipamentos = new Equipamentos();
            $projetores=new Projetores();

            $equipamentos->descricao = $data['descricao'];
            $equipamentos->localizacao_id = $data['localizacao'];
            $equipamentos->marca_id = $data['marca'];
            $equipamentos->tipo_id = $data['tipoEquipamento'];
            $equipamentos->save();

            $equipamentos_id=$equipamentos->id;

            $projetores->tipoProjetor = $data['tipoProjetor'];
            $projetores->modeloProjetor = $data['modeloProjetor'];
            $projetores->equipamento_id=$equipamentos_id;
            $projetores->save();

            $equipamentos->projetores_id=$projetores->id;
            $equipamentos->save();
        }
        elseif($qual==3){
            $request->validate([
                'descricao' => 'required',
                'localizacao' => 'required',
                'marca' => 'required',
                'codBastidor' => 'required',
            ]);
            $data = $request->all();
            $equipamentos = new Equipamentos();
            $bastidores=new Bastidores();

            $equipamentos->descricao = $data['descricao'];
            $equipamentos->localizacao_id = $data['localizacao'];
            $equipamentos->marca_id = $data['marca'];
            $equipamentos->tipo_id = $data['tipoEquipamento'];
            $equipamentos->save();
    
            $equipamentos_id=$equipamentos->id;

            $bastidores->codBastidor = $data['codBastidor'];
            $bastidores->equipamento_id=$equipamentos_id;
            $bastidores->save();

            $equipamentos->bastidores_id=$bastidores->id;
            $equipamentos->save();
        }
        elseif($qual==4){
            $request->validate([
                'descricao' => 'required',
                'localizacao' => 'required',
                'marca' => 'required',
                'codBastidor_id' => 'required',
                'codSwitch' => 'required',
                'nrTotalPortas' => 'required',
            ]);
            $data = $request->all();
            $equipamentos = new Equipamentos();
            $switch= new Switchs();
            $equipamentos->descricao = $data['descricao'];
            $equipamentos->localizacao_id = $data['localizacao'];
            $equipamentos->marca_id = $data['marca'];
            $equipamentos->tipo_id = $data['tipoEquipamento'];
            $equipamentos->save();
    
            $equipamentos_id=$equipamentos->id;

            $switch->codBastidor_id = $data['codBastidor_id'];
            $switch->codSwitch = $data['codSwitch'];
            $switch->nrTotalPortas = $data['nrTotalPortas'];
            $switch->equipamento_id=$equipamentos_id;
            $switch->save();

            $equipamentos->switchs_id=$switch->id;
            $equipamentos->save();
        }
        elseif($qual==5){
            $request->validate([
                'descricao' => 'required',
                'localizacao' => 'required',
                'marca' => 'required',
                'codSwitch_id' => 'required',
                'nrPortaSwitch' => 'required',
                'nrTomadaRede' => 'required',
            ]);
            $data = $request->all();
            $equipamentos = new Equipamentos();
            $accespoints= new AccessPoints();

            $equipamentos->descricao = $data['descricao'];
            $equipamentos->localizacao_id = $data['localizacao'];
            $equipamentos->marca_id = $data['marca'];
            $equipamentos->tipo_id = $data['tipoEquipamento'];
            $equipamentos->save();

            $equipamentos_id=$equipamentos->id;

            $accespoints->codSwitch_id = $data['codSwitch_id'];
            $accespoints->nrPortaSwitch = $data['nrPortaSwitch'];
            $accespoints->nrTomadaRede = $data['nrTomadaRede'];
            $accespoints->equipamento_id=$equipamentos_id;
            $accespoints->save();

            $equipamentos->accesspoints_id=$accespoints->id;
            $equipamentos->save();
        }
        else{
            $request->validate([
                'descricao' => 'required',
                'localizacao' => 'required',
                'marca' => 'required',
            ]);
            $data = $request->all();
            $equipamentos = new Equipamentos();
            $equipamentos->descricao = $data['descricao'];
            $equipamentos->localizacao_id = $data['localizacao'];
            $equipamentos->marca_id = $data['marca'];
            $equipamentos->tipo_id = $data['tipoEquipamento'];
            $equipamentos->save();
        }
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
        $equipamento= Equipamentos::findOrFail($id);
        return view('Admin.Equipamentos.show')->with(compact('equipamento'));
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
        $equipedit =Equipamentos::faindOrFail($id);
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
