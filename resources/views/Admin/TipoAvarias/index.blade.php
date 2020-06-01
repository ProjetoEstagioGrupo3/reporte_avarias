@extends('Admin.Layouts.home')

@section('content')
<section class="content">
    <br>
    <div class="container-fluid">
      <div class="row">
        <div class="col-7">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Localizações</h3>
            </div>
            <div class="card-body" id="callout">
               @foreach ($tpavaria as $tpav)
               <div class="callout callout-success">
               <div class="row">
                <div class="col-9">
                  <h5>{{$tpav->tip_avaria}}</h5>
                  <p>{{$tpav->descricao}}</p>
                  </div>
                  <div class="col-3">
                      <div class="row">
                      <a href="/TipoAvarias/{{$tpav->id}}/edit" class="btn btn-warning mr-2">Editar</a> 
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
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Novo Tipo de Avaria</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('TipoAvarias.store')}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label>Tipo de Avaria</label>
                  <input type="text" class="form-control @if($errors->any('tip_avaria')) @if($errors->has('tip_avaria')) is-invalid @else is-valid @endif @endif" id="tip_avaria" name="tip_avaria" value="{{old('tip_avaria')}}" placeholder="Tipo de Avaria">
                    @error('tip_avaria')
                      <div class="invalid-feedback">{{$errors->first('tip_avaria')}}</div>
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
                <button type="submit" class="btn btn-primary">Adicionar</button>
              </div>
            </form>
          </div>
          @else
          <div class="card card-warning">
            <div class="card-header">
              <h3 class="card-title">Editar Tipo de Avaria</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('TipoAvarias.update',$tpavariaedit->id)}}" method="post" enctype="multipart/form-data">
              @csrf
              @method('put')
              <div class="card-body">
                <div class="form-group">
                  <label for="tip_avaria">Tipo de Avaria</label>
                  <input type="text" class="form-control @if($errors->any('tip_avaria')) @if($errors->has('tip_avaria')) is-invalid @else is-valid @endif @endif" id="tip_avaria" name="tip_avaria" value="{{$tpavariaedit->tip_avaria}}" placeholder="localizacao">
                  @error('tip_avaria')
                    <div class="invalid-feedback">{{$errors->first('tip_avaria')}}</div>
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
                <button type="submit" class="btn btn-warning">Guardar</button>
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