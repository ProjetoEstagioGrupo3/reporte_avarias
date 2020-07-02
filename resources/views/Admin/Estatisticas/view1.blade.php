@extends('Admin.Layouts.home')

@section('content')
<style type="text/css">
.hidden{
  display: none;
}
input{
  display: block;
}
</style>
<section class="content">
    <br>
    <div class="container-fluid">
      <div class="row">
        <label for="tipoEquipamento">Tipo de Equipamento</label>
            <select class="form-control" id="tipoEquipamento" name="tipoEquipamento">
                @foreach ($tipos as $tipo)
                    <option value="{{$tipo->id}}" onclick="mostra('{{$tipo->id}}')">{{$tipo->tipoEquipamento}}</option>
                @endforeach
            </select>
           <!--PC-->
           <div id="1" class="hidden">
            <div class="row">
              <div class="col">
                Localizacao <br>
                @foreach ($equipamentos as $equipa)
                 @if ($equipa->tipoEquipamento->id=='1')
                 {{$equipa->Localizacoes->localizacao}}
                 <br>
                 @endif
                @endforeach
              </div>
              <div class="col">
                Marca <br>
                @foreach ($equipamentos as $equipa)
                @if ($equipa->tipoEquipamento->id=='1')
                {{$equipa->marcas->marca}}
                <br>
                @endif
                @endforeach
              </div>
              <div class="col">
                Tipo de equipamento 
                @foreach ($equipamentos as $equipa)
                @if ($equipa->tipoEquipamento->id=='1')
                {{$equipa->tipoEquipamento->tipoEquipamento}}
                <br>  
                @endif
                @endforeach
              </div>
              <div class="col">
                Descricao
                @foreach ($equipamentos as $equipa)
                @if ($equipa->tipoEquipamento->id=='1')
                  {{$equipa->descricao}}
                  <br>
                @endif
                @endforeach
              </div>
              <div class="col">
                Macadrres
                @foreach ($pcs as $pc)
                  {{$pc->macaddress}}
                  <br>
                @endforeach
              </div>
              <div class="col">
                Sitema Operativo
                @foreach ($pcs as $pc)
                  {{$pc->sitemaOperativo}}
                  <br>
                @endforeach
              </div>
              <div class="col">
                 Ram <br>
                @foreach ($pcs as $pc)
                  {{$pc->ram}}
                  <br>
                @endforeach
              </div>
            </div> 
          </div>
          <!--projetores-->
          <div id="2"  class="hidden">
            <div class="row">
              <div class="col">
                Localizacao <br>
                @foreach ($equipamentos as $equipa)
                 @if ($equipa->tipoEquipamento->id=='2')
                 {{$equipa->Localizacoes->localizacao}}
                 <br>
                 @endif
                @endforeach
              </div>
              <div class="col">
                Marca <br>
                @foreach ($equipamentos as $equipa)
                @if ($equipa->tipoEquipamento->id=='2')
                {{$equipa->marcas->marca}}
                <br>
                @endif
                @endforeach
              </div>
              <div class="col">
                Tipo de equipamento 
                @foreach ($equipamentos as $equipa)
                @if ($equipa->tipoEquipamento->id=='2')
                {{$equipa->tipoEquipamento->tipoEquipamento}}
                <br>  
                @endif
                @endforeach
              </div>
              <div class="col">
                Descricao <br>
                @foreach ($equipamentos as $equipa)
                @if ($equipa->tipoEquipamento->id=='2')
                  {{$equipa->descricao}}
                  <br>
                @endif
                @endforeach
              </div>
              <div class="col">
                Tipo de Projetor <br>
                @foreach ($projs as $proj)
                  {{$proj->tipoProjetor}}
                  <br>
                @endforeach
              </div>
              <div class="col">
                Modelo Projetor <br>
                @foreach ($projs as $proj)
                  {{$proj->modeloProjetor}}
                  <br>
                @endforeach
              </div>
            </div> 
          </div>
          <!--Bastidores-->
          <div id="3"  class="hidden">
            <div class="row">
              <div class="col">
                Localizacao <br>
                @foreach ($equipamentos as $equipa)
                 @if ($equipa->tipoEquipamento->id=='3')
                 {{$equipa->Localizacoes->localizacao}}
                 <br>
                 @endif
                @endforeach
              </div>
              <div class="col">
                Marca <br>
                @foreach ($equipamentos as $equipa)
                @if ($equipa->tipoEquipamento->id=='3')
                {{$equipa->marcas->marca}}
                <br>
                @endif
                @endforeach
              </div>
              <div class="col-3">
                Tipo de equipamento 
                @foreach ($equipamentos as $equipa)
                @if ($equipa->tipoEquipamento->id=='3')
                {{$equipa->tipoEquipamento->tipoEquipamento}}
                <br>  
                @endif
                @endforeach
              </div>
              <div class="col">
                Descricao
                @foreach ($equipamentos as $equipa)
                @if ($equipa->tipoEquipamento->id=='3')
                  {{$equipa->descricao}}
                  <br>
                @endif
                @endforeach
              </div>
              <div class="col">
                codigo do Bastidor
                @foreach ($basts as $bast)
                  {{$bast->codBastidor}}
                  <br>
                @endforeach
              </div>
            </div> 
          </div>
          <!--Switchs-->
          <div id="4"  class="hidden">
            <div class="row">
              <div class="col">
              Localizacao <br>
              @foreach ($equipamentos as $equipa)
               @if ($equipa->tipoEquipamento->id=='4')
               {{$equipa->Localizacoes->localizacao}}
               <br>
               @endif
              @endforeach
            </div>
            <div class="col">
              Marca <br>
              @foreach ($equipamentos as $equipa)
              @if ($equipa->tipoEquipamento->id=='4')
              {{$equipa->marcas->marca}}
              <br>
              @endif
              @endforeach
            </div>
            <div class="col">
              Tipo de equipamento 
              @foreach ($equipamentos as $equipa)
              @if ($equipa->tipoEquipamento->id=='4')
              {{$equipa->tipoEquipamento->tipoEquipamento}}
              <br>  
              @endif
              @endforeach
            </div>
            <div class="col">
              Descricao
              @foreach ($equipamentos as $equipa)
              @if ($equipa->tipoEquipamento->id=='4')
                {{$equipa->descricao}}
                <br>
              @endif
              @endforeach
            </div>
              <div class="col">
                Numero total de portas
                @foreach ($switchs as $switch)
                  {{$switch->nrTotalPortas}}
                  <br>
                @endforeach
              </div>
              <div class="col">
                Codigo do Switch <br>
                @foreach ($switchs as $switch)
                  {{$switch->codSwitch}}
                  <br>
                @endforeach
              </div>
              <div class="col">
                Modelo Projetor <br>
                @foreach ($switchs as $switch)
                  {{$switch->Bastidores->codBastidor}}
                  <br>
                @endforeach
              </div>
            </div> 
          </div>
          <!--Accespoints-->
          <div id="5"  class="hidden">
            <div class="row">
              <div class="col">
                Localizacao <br>
                @foreach ($equipamentos as $equipa)
                 @if ($equipa->tipoEquipamento->id=='5')
                 {{$equipa->Localizacoes->localizacao}}
                 <br>
                 @endif
                @endforeach
              </div>
              <div class="col">
                Marca <br>
                @foreach ($equipamentos as $equipa)
                @if ($equipa->tipoEquipamento->id=='5')
                {{$equipa->marcas->marca}}
                <br>
                @endif
                @endforeach
              </div>
              <div class="col-2">
                Tipo de equipamento 
                @foreach ($equipamentos as $equipa)
                @if ($equipa->tipoEquipamento->id=='5')
                {{$equipa->tipoEquipamento->tipoEquipamento}}
                <br>  
                @endif
                @endforeach
              </div>
              <div class="col">
                Descricao
                @foreach ($equipamentos as $equipa)
                @if ($equipa->tipoEquipamento->id=='5')
                  {{$equipa->descricao}}
                  <br>
                @endif
                @endforeach
              </div>
              <div class="col">
                Tipo de Projetor
                @foreach ($projs as $proj)
                  {{$proj->tipoProjetor}}
                  <br>
                @endforeach
              </div>
              <div class="col">
                Modelo Projetor <br>
                @foreach ($projs as $proj)
                  {{$proj->modeloProjetor}}
                  <br>
                @endforeach
              </div>
            </div> 
            </div>
          </div>
        </div>
          <!---->
    </div>
    <script>
      function mostra(id){
        if(document.getElementById(id).style.display == 'block'){
          document.getElementById(id).style.display = 'none';
        }else{document.getElementById(id).style.display='block';}

      }
    </script>
  </section>
@endsection