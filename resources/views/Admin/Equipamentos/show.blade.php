@extends('Admin.Layouts.home')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <h6>{{$equipamento->Localizacoes->localizacao}}</h6> 
            <h6>{{$equipamento->marcas->marca}}</h6>
            <h6>{{$equipamento->TipoEquipamento->tipoEquipamento}}</h6> 
            <h6>{{$equipamento->descricao}}</h6> 
            <h6>{{$equipamento->Computadores->macaddress}}</h6> 




            <!--Nao esta a passar os campos que vem de outras tabelas:"computadores,projetores,bastidores,switchs,accespoints"
            o que passa sem problemas é ast tabelas relativas aos equipamentos e as tabelas de marcas,localizacoes,tipo de avarias-->
        </div>
    </div>
  </section>
@endsection