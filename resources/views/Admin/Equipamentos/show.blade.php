@extends('Admin.Layouts.home')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <h6>{{$equipamento->Localizacoes->localizacao}}</h6> 
            <h6>{{$equipamento->marcas->marca}}</h6>
            <h6>{{$equipamento->TipoEquipamento->tipoEquipamento}}</h6> 
            <h6>{{$equipamento->descricao}}</h6>  
            @foreach ($pcs as $pc)
                @if ($pc->equipamento_id==$equipamento->id)
                    <h6>{{$pc->macaddress}}</h6> 
                    <h6>{{$pc->sistemaOperativo}}</h6> 
                    <h6>{{$pc->ram}}</h6> 
                @endif
            @endforeach
            @foreach ($projs as $proj)
                @if ($proj->equipamento_id==$equipamento->id)
                    <h6>{{$proj->tipoProjetor}}</h6> 
                    <h6>{{$proj->modeloProjetor}}</h6> 
                @endif
            @endforeach
            @foreach ($basts as $bast)
                @if ($bast->equipamento_id==$equipamento->id)
                    <h6>{{$bast->codBastidor}}</h6> 
                @endif
            @endforeach
            @foreach ($switchs as $switch)
                @if ($switch->equipamento_id==$equipamento->id)
                    <h6>{{$switch->Bastidores->codBastidor}}</h6> 
                    <h6>{{$switch->codSwitch}}</h6> 
                    <h6>{{$switch->nrTotalPortas}}</h6> 
                @endif
            @endforeach
            @foreach ($accesps as $acesp)
                @if ($acesp->equipamento_id==$equipamento->id)
                    <h6>{{$acesp->nrPortaSwitch}}</h6> 
                    <h6>{{$acesp->nrTomadaRede}}</h6> 
                    <h6>{{$acesp->Switchs->codSwitch}}</h6> 
                @endif
            @endforeach
        </div>
    </div>
  </section>
@endsection