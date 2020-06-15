@extends('Admin.Layouts.home')

@section('content')
<section class="content">
    <br>
    <div class="container-fluid">
      <div class="row">
        <div class="col-7">
          <div class="card">
            <div class="card-header" style="background-color: #042d6e">
              <h3 class="card-title" style="color:white">Tipos de Avaria</h3>
            </div>
            <div class="card-body">
               @foreach ($tpavaria as $tpav)
               <div class="callout callout-success" id="callout">
               <div class="row">
                <div class="col-8">
                  <h5>{{$tpav->tipo_avaria}}</h5>
                  <p>{{$tpav->descricao}}</p>
                  </div>
                  <div class="col-4">
                      <div class="row">
                      <a href="/TipoAvarias/{{$tpav->id}}/edit" class="btn btn-secondary mr-2"><font color="white">Editar</font></a> 
                      <form action="{{route('TipoAvarias.destroy',$tpav->id)}}" method="POST">
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
              {{ $tpavaria->links() }}
            </div>
          </div>
        </div>
        <!-- left column -->
        <div class="col-5">
          <!-- general form elements -->
          
          @if ($cr_ed==0)
          <div class="card">
            <div class="card-header" style="background-color: #042d6e">
              <h3 class="card-title" style="color:white">Novo Tipo de Avaria</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('TipoAvarias.store')}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label>Tipo de Avaria</label>
                  <input type="text" class="form-control @if($errors->any('tipo_avaria')) @if($errors->has('tipo_avaria')) is-invalid @else is-valid @endif @endif" id="tipo_avaria" name="tipo_avaria" value="{{old('tipo_avaria')}}" placeholder="Tipo de Avaria">
                    @error('tipo_avaria')
                      <div class="invalid-feedback">{{$errors->first('tipo_avaria')}}</div>
                    @enderror
                </div>
                <div class="form-group">
                  <label>Descrição</label>
                  <input type="text" class="form-control @if($errors->any('descricao')) @if($errors->has('descricao')) is-invalid @else is-valid @endif @endif" id="descricao" name="descricao" value="{{old('descricao')}}" placeholder="Descrição">
                    @error('descricao')
                      <div class="invalid-feedback">{{$errors->first('descricao')}}</div>
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
              <h3 class="card-title" style="color:white">Editar Tipo de Avaria</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('TipoAvarias.update',$tpavariaedit->id)}}" method="post" enctype="multipart/form-data">
              @csrf
              @method('put')
              <div class="card-body">
                <div class="form-group">
                  <label for="tipo_avaria">Tipo de Avaria</label>
                  <input type="text" class="form-control @if($errors->any('tipo_avaria')) @if($errors->has('tipo_avaria')) is-invalid @else is-valid @endif @endif" id="tipo_avaria" name="tipo_avaria" value="{{$tpavariaedit->tipo_avaria}}" placeholder="localizacao">
                  @error('tipo_avaria')
                    <div class="invalid-feedback">{{$errors->first('tipo_avaria')}}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="descricao">Descrição</label>
                  <input type="text" class="form-control @if($errors->any('descricao')) @if($errors->has('descricao')) is-invalid @else is-valid @endif @endif" id="descricao" name="descricao" value="{{$tpavariaedit->descricao}}" placeholder="descricao">
                  @error('descricao')
                    <div class="invalid-feedback">{{$errors->first('descricao')}}</div>
                  @enderror
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-secondary">Guardar</button>
                <a href="/TipoAvarias" class="btn btn-danger">Cancelar</a>
              </div>
            </form>
          </div>
          @endif
        </div>
      </div>
    </div>
  </section>
@endsection