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
        <div class="col-7">
          <div class="card">
            <div class="card-header" style="background-color: #042d6e">
              <h3 class="card-title" style="color:white">Equipamentos</h3>
            </div>
            <div class="card-body">
               @foreach ($equipamentos as $equip)
               <div class="callout callout-success" id="callout">
               <div class="row">
                <div class="col-9">
                  <h5>{{$equip->Localizacoes->localizacao}}</h5>
                  <h5>{{$equip->marcas->marca}}</h5>
                  <h5>{{$equip->descricao}}</h5>
                  <h5>{{$equip->TipoEquipamento->tipoEquipamento}}</h5>
                  </div>
                  <div class="col-3">
                      <div class="row">
                      <a href="/Equipamentos/{{$equip->id}}" class="btn btn-success mr-2"  style="color:white" ><i class="far fa-eye"></i></a>
                      <a href="/Equipamentos/{{$equip->id}}/edit" class="btn btn-secondary mr-2" style="color:white" ><i class="far fa-edit"></i></a> 
                      <form action="{{route('Equipamentos.destroy',$equip->id)}}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger mr-2 "><i class="fas fa-trash"></i></button>
                      </form>
                      </div>
                  </div>
               </div>
              </div>
               @endforeach
               <style>
                 #callout{
                  padding: 10px;
                  margin: 5px 0;
                  border-left-width: 5px;
                  border-radius: 3px;
                  border-left-color: #071e33;
                 }
               </style>
            </div>
            <div class="card-footer">
              {{ $equipamentos->links() }}
            </div>
          </div>
        </div>
        <!-- left column -->
        <div class="col-5">
          <!-- general form elements -->
          
          @if ($cr_ed==0)
          <div class="card">
            <div class="card-header" style="background-color: #042d6e">
              <h3 class="card-title" style="color:white">Novo Equipamento</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('Equipamentos.store')}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="localizacao">Localização</label>
                  <select class="form-control" id="localizacao" name="localizacao">
                      @foreach ($localizacoes as $localizacao)
                          <option value="{{$localizacao->id}}">{{$localizacao->localizacao}}</option>
                      @endforeach
                  </select>
                  @error('localizacao')
                      <div class="invalid-feedback">{{$errors->first('localizacao')}}</div>
                  @enderror
                </div>
                  <div class="form-group">
                    <label for="marca">Marca</label>
                    <select class="form-control" id="marca" name="marca">
                        @foreach ($marcas as $marca)
                            <option value="{{$marca->id}}">{{$marca->marca}}</option>
                        @endforeach
                    </select>
                    @error('marca')
                        <div class="invalid-feedback">{{$errors->first('marca')}}</div>
                    @enderror
                  </div>
                <div class="form-group">
                  <label for="descricao">Descrição</label>
                  <input type="text" class="form-control @if($errors->any('descricao')) @if($errors->has('descricao')) is-invalid @else is-valid @endif @endif" id="descricao" name="descricao" value="{{old('descricao')}}" placeholder="Descricão">
                    @error('descricao')
                      <div class="invalid-feedback">{{$errors->first('descricao')}}</div>
                    @enderror
                </div>
                <div class="form-group">
                  <label for="tipoEquipamento">Tipo de Equipamento</label>
                  <select class="form-control" id="tipoEquipamento" name="tipoEquipamento">
                      @foreach ($tipos as $tipo)
                          <option value="{{$tipo->id}}" onclick="mostra('{{$tipo->id}}')">{{$tipo->tipoEquipamento}}</option>
                      @endforeach
                  </select>
                  @error('tipoEquipamento')
                      <div class="invalid-feedback">{{$errors->first('tipoEquipamento')}}</div>
                  @enderror
                </div>
                 <!--PC-->
                 <div id="1" class="hidden">
                  <div class="form-group">
                    <label for="macaddress">Macaddress</label>
                      <input type="text" class="form-control @if($errors->any('macaddress')) @if($errors->has('macaddress')) is-invalid @else is-valid @endif @endif" id="macaddress" name="macaddress" value="{{old('macaddress')}}" placeholder="macaddress">
                    @error('macaddress')
                        <div class="invalid-feedback">{{$errors->first('macaddress')}}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="sistemaOperativo">Sistema Operativo</label>
                      <input type="text" class="form-control @if($errors->any('sistemaOperativo')) @if($errors->has('sistemaOperativo')) is-invalid @else is-valid @endif @endif" id="sistemaOperativo" name="sistemaOperativo" value="{{old('sistemaOperativo')}}" placeholder="sistemaOperativo">
                    @error('sistemaOperativo')
                        <div class="invalid-feedback">{{$errors->first('sistemaOperativo')}}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="ram">Memoria Ram</label>
                      <input type="numeric" class="form-control @if($errors->any('ram')) @if($errors->has('ram')) is-invalid @else is-valid @endif @endif" id="ram" name="ram" value="{{old('ram')}}" placeholder="ram">
                    @error('ram')
                        <div class="invalid-feedback">{{$errors->first('ram')}}</div>
                    @enderror
                  </div>
                </div>
                <!--projetores-->
                <div id="2"  class="hidden">
                  <div class="form-group">
                    <label for="tipoProjetor">Tipo Projetor</label>
                    <input type="text" class="form-control @if($errors->any('tipoProjetor')) @if($errors->has('tipoProjetor')) is-invalid @else is-valid @endif @endif" id="tipoProjetor" name="tipoProjetor" value="{{old('tipoProjetor')}}" placeholder="tipoProjetor">
                    @error('tipoProjetor')
                        <div class="invalid-feedback">{{$errors->first('tipoProjetor')}}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="modeloProjetor"> Modelo de Projetor</label>
                    <input type="text" class="form-control @if($errors->any('modeloProjetor')) @if($errors->has('modeloProjetor')) is-invalid @else is-valid @endif @endif" id="modeloProjetor" name="modeloProjetor" value="{{old('modeloProjetor')}}" placeholder="modeloProjetor">

                    @error('modeloProjetor')
                        <div class="invalid-feedback">{{$errors->first('modeloProjetor')}}</div>
                    @enderror
                  </div>
                </div>
                <!--Bastidores-->
                <div id="3"  class="hidden">
                  <div class="form-group">
                    <label for="codBastidor">Codigo do Bastidor</label>
                    <input type="text" class="form-control @if($errors->any('codBastidor')) @if($errors->has('codBastidor')) is-invalid @else is-valid @endif @endif" id="codBastidor" name="codBastidor" value="{{old('codBastidor')}}" placeholder="codBastidor">
                    @error('codBastidor')
                        <div class="invalid-feedback">{{$errors->first('codBastidor')}}</div>
                    @enderror
                  </div>
                </div>
                <!--Switchs-->
                <div id="4"  class="hidden">
                  <div class="form-group">
                    <label for="codBastidor_id">Codigo do Bastidor</label>
                    <select class="form-control" id="codBastidor_id" name="codBastidor_id">
                      @foreach ($basts as $bast)
                          <option value="{{$bast->id}}">{{$bast->codBastidor}}</option>
                      @endforeach
                  </select>
                    @error('codBastidor_id')
                        <div class="invalid-feedback">{{$errors->first('codBastidor_id')}}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="codSwitch">Codigo do Bastidor</label>
                    <input type="text" class="form-control @if($errors->any('codSwitch')) @if($errors->has('codSwitch')) is-invalid @else is-valid @endif @endif" id="codSwitch" name="codSwitch" value="{{old('codSwitch')}}" placeholder="codSwitch">
                    @error('codSwitch')
                        <div class="invalid-feedback">{{$errors->first('codSwitch')}}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="nrTotalPortas">Numero total de portas</label>
                    <input type="text" class="form-control @if($errors->any('nrTotalPortas')) @if($errors->has('nrTotalPortas')) is-invalid @else is-valid @endif @endif" id="nrTotalPortas" name="nrTotalPortas" value="{{old('nrTotalPortas')}}" placeholder="nrTotalPortas">
                    @error('nrTotalPortas')
                        <div class="invalid-feedback">{{$errors->first('nrTotalPortas')}}</div>
                    @enderror
                  </div>
                </div>
                <!--Accespoints-->
                <div id="5"  class="hidden">
                  <div class="form-group">
                    <label for="codSwitch_id">Codigo do Bastidor</label>
                    <select class="form-control" id="codSwitch_id" name="codSwitch_id">
                      @foreach ($switch as $switchs)
                          <option value="{{$switchs->id}}">{{$switchs->codSwitch}}</option>
                      @endforeach
                  </select>
                    @error('codSwitch_id')
                        <div class="invalid-feedback">{{$errors->first('codSwitch_id')}}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="nrPortaSwitch">Numero total de portas</label>
                    <input type="text" class="form-control @if($errors->any('nrPortaSwitch')) @if($errors->has('nrPortaSwitch')) is-invalid @else is-valid @endif @endif" id="nrPortaSwitch" name="nrPortaSwitch" value="{{old('nrPortaSwitch')}}" placeholder="nrPortaSwitch">
                    @error('nrPortaSwitch')
                        <div class="invalid-feedback">{{$errors->first('nrPortaSwitch')}}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="nrTomadaRede">Numero total de portas</label>
                    <input type="text" class="form-control @if($errors->any('nrTomadaRede')) @if($errors->has('nrTomadaRede')) is-invalid @else is-valid @endif @endif" id="nrTomadaRede" name="nrTomadaRede" value="{{old('nrTomadaRede')}}" placeholder="nrTomadaRede">
                    @error('nrTomadaRede')
                        <div class="invalid-feedback">{{$errors->first('nrTomadaRede')}}</div>
                    @enderror
                  </div>
                </div>
              </div>
                <!---->
              </div>
              <div class="card-footer">
                <button type="submit" class="btn" style="background-color: #042d6e"><font color="white">Adicionar</font></button>
              </div>
            </form>
          </div>
          @else
          <div class="card">
            <div class="card-header" style="background-color: #042d6e">
              <h3 class="card-title" style="color:white">Editar Equipamento</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('Tipos.update',$equipedit->id)}}" method="post" enctype="multipart/form-data">
              @csrf
              @method('put')
              <div class="card-body">
                <div class="form-group">
                  <label for="localizacao">Localização</label>
                  <select class="form-control @if($errors->any('localizacao')) @if($errors->has('localizacao')) is-invalid @else is-valid @endif @endif" id="localizacao" name="localizacao" value="{{$equipedit->localizacao}}">
                    @foreach ($localizacoes as $localizacao)
                        <option value="{{$localizacao->id}}">{{$localizacao->localizacao}}</option>
                    @endforeach
                  </select>
                  @error('localizacao')
                    <div class="invalid-feedback">{{$errors->first('localizacao')}}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="marca">Marca</label>
                  <select class="form-control @if($errors->any('marca')) @if($errors->has('marca')) is-invalid @else is-valid @endif @endif" id="marca" name="marca" value="{{$equipedit->marca}}">
                    @foreach ($marcas as $marca)
                        <option value="{{$marca->id}}">{{$marca->marca}}</option>
                    @endforeach
                </select>
                  @error('marca')
                    <div class="invalid-feedback">{{$errors->first('marca')}}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="descricao">Descrição</label>
                  <input type="text" class="form-control @if($errors->any('descricao')) @if($errors->has('descricao')) is-invalid @else is-valid @endif @endif" id="descricao" name="descricao" value="{{$equipedit->descricao}}">
                  @error('descricao')
                    <div class="invalid-feedback">{{$errors->first('descricao')}}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="tipoequipamento">Tipo de Equipamento</label>
                  <select class="form-control @if($errors->any('tipoequipamento')) @if($errors->has('tipoequipamento')) is-invalid @else is-valid @endif @endif" id="tipoequipamento" name="tipoequipamento" value="{{$equipedit->tipoEquipamento}}">
                    @foreach ($tipos as $tipo)
                        <option value="{{$tipo->id}}">{{$tipo->tipoEquipamento}}</option>
                    @endforeach
                </select>
                  @error('tipoequipamento')
                    <div class="invalid-feedback">{{$errors->first('tipoequipamento')}}</div>
                  @enderror
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-secondary">Guardar</button>
                <a href="/Equipamentos" class="btn btn-danger">Cancelar</a>
              </div>
            </form>
          </div>
          @endif
        </div>
      </div>
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