@extends('Admin.Layouts.home')

@section('content')
<section class="content">
    <br>
    <div class="container-fluid">
      <div class="row">
        <div class="col-7">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Marcas</h3>
            </div>
            <div class="card-body" id="callout">
               @foreach ($marca as $marcas)
               <div class="callout callout-success">
               <div class="row">
                <div class="col-9">
                  <h5>{{$marcas->marca}}</h5>
                  </div>
                  <div class="col-3">
                      <div class="row">
                      <a href="/Marcas/{{$marcas->id}}/edit" class="btn btn-warning mr-2">Editar</a> 
                      <form action="{{route('Marcas.destroy',$marcas->id)}}" method="POST">
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
              {{ $marca->links() }}
            </div>
          </div>
        </div>
        <!-- left column -->
        <div class="col-5">
          <!-- general form elements -->
          
          @if ($cr_ed==0)
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Nova Marca</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('Marcas.store')}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label>Marca</label>
                  <input type="text" class="form-control @if($errors->any('marca')) @if($errors->has('marca')) is-invalid @else is-valid @endif @endif" id="marca" name="marca" value="{{old('marca')}}" placeholder="Marca">
                    @error('marca')
                      <div class="invalid-feedback">{{$errors->first('marca')}}</div>
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
              <h3 class="card-title">Editar Localização</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('Marcas.update',$marcaedit->id)}}" method="post" enctype="multipart/form-data">
              @csrf
              @method('put')
              <div class="card-body">
                <div class="form-group">
                  <label for="marca">Localização</label>
                  <input type="text" class="form-control @if($errors->any('marca')) @if($errors->has('marca')) is-invalid @else is-valid @endif @endif" id="marca" name="marca" value="{{$marcaedit->marca}}" placeholder="marca">
                  @error('marca')
                    <div class="invalid-feedback">{{$errors->first('marca')}}</div>
                  @enderror
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-warning">Guardar</button>
                <a href="/Marcas" class="btn btn-danger">Cancelar</a>
              </div>
            </form>
          </div>
          @endif
        </div>
      </div>
    </div>
  </section>
@endsection