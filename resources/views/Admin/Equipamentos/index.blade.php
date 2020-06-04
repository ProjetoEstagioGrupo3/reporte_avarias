@extends('Admin.Layouts.home')

@section('content')
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
                <div class="col-8">
                  <h5>{{$equip->id_localizacao}}</h5>
                  <h5>{{$equip->id_marca}}</h5>
                  <h5>{{$equip->descricao}}</h5>
                  <h5>{{$equip->tipoequipamento}}</h5>
                  </div>
                  <div class="col-4">
                      <div class="row">
                      <a href="/Equipamentos/{{$equip->id}}/edit" class="btn btn-secondary mr-2"><font color="white">Editar</font></a> 
                      <form action="{{route('Equipamentos.destroy',$equip->id)}}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger ">Eliminar</button>
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
                          <option value="{{$tipo->id}}">{{$tipo->tipoEquipamento}}</option>
                      @endforeach
                  </select>
                  @error('tipoEquipamento')
                      <div class="invalid-feedback">{{$errors->first('tipoEquipamento')}}</div>
                  @enderror
                </div>
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
               <!--computadores-->
               <div class="form-group">
                <label for="macaddress">Macaddress</label>
                <input type="int" class="form-control @if($errors->any('macaddress')) @if($errors->has('macaddress')) is-invalid @else is-valid @endif @endif" id="macaddress" name="macaddress" value="{{$equipamentos->computradores->macaddress}}">
                @error('macaddress')
                  <div class="invalid-feedback">{{$errors->first('macaddress')}}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="sistemaOperativo">Sistema Operativo</label>
                <input type="text" class="form-control @if($errors->any('sistemaOperativo')) @if($errors->has('sistemaOperativo')) is-invalid @else is-valid @endif @endif" id="sistemaOperativo" name="sistemaOperativo" value="{{$equipedit->descricao}}">
                @error('sistemaOperativo')
                  <div class="invalid-feedback">{{$errors->first('sistemaOperativo')}}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="ram"> Memoria Ram</label>
                <input type="int" class="form-control @if($errors->any('ram')) @if($errors->has('ram')) is-invalid @else is-valid @endif @endif" id="ram" name="ram" value="{{$equipedit->descricao}}">
                @error('ram')
                  <div class="invalid-feedback">{{$errors->first('ram')}}</div>
                @enderror
              </div>
               <!--Projetores-->
               <div class="form-group">
                <label for="tipoProjetor">Tipo de Projetor</label>
                <input type="text" class="form-control @if($errors->any('tipoProjetor')) @if($errors->has('tipoProjetor')) is-invalid @else is-valid @endif @endif" id="tipoProjetor" name="tipoProjetor" value="{{$equipedit->descricao}}">
                @error('tipoProjetor')
                  <div class="invalid-feedback">{{$errors->first('tipoProjetor')}}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="modeloProjetor">Modelo do Projetor</label>
                <input type="text" class="form-control @if($errors->any('modeloProjetor')) @if($errors->has('modeloProjetor')) is-invalid @else is-valid @endif @endif" id="modeloProjetor" name="modeloProjetor" value="{{$equipedit->descricao}}">
                @error('modeloProjetor')
                  <div class="invalid-feedback">{{$errors->first('modeloProjetor')}}</div>
                @enderror
              </div>
               <!--batidores-->
               <div class="form-group">
                <label for="codBastidor">Codigo do Bastidor</label>
                <input type="int" class="form-control @if($errors->any('codBastidor')) @if($errors->has('codBastidor')) is-invalid @else is-valid @endif @endif" id="codBastidor" name="codBastidor" value="{{$equipedit->descricao}}">
                @error('codBastidor')
                  <div class="invalid-feedback">{{$errors->first('codBastidor')}}</div>
                @enderror
              </div>
              <!--mais nada-->
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
</section>
@endsection