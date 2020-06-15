@extends('Admin.Layouts.home')

@section('content')
<section class="content">
    <br>
    <div class="container-fluid">
      <div class="row">
        <div class="col-7">
          <div class="card">
            <div class="card-header" style="background-color: #042d6e">
              <h3 class="card-title" style="color:white">Localizações</h3>
            </div>
            <div class="card-body">
               @foreach ($locS as $loc)
               <div class="callout callout-success" id="callout">
               <div class="row">
                <div class="col-8">
                  <h5>{{$loc->localizacao}}</h5>
                  </div>
                  <div class="col-4">
                      <div class="row">
                      <a href="/Localizacoes/{{$loc->id}}/edit" class="btn btn-secondary mr-2"><font color="white">Editar</font></a> 
                      <form action="{{route('Localizacoes.destroy',$loc->id)}}" method="POST">
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
              {{ $locS->links() }}
            </div>
          </div>
        </div>
        <!-- left column -->
        <div class="col-5">
          <!-- general form elements -->
          
          @if ($cr_ed==0)
          <div class="card">
            <div class="card-header" style="background-color: #042d6e">
              <h3 class="card-title" style="color:white">Nova Localização</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('Localizacoes.store')}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label>Localizaçao</label>
                  <input type="text" class="form-control @if($errors->any('localizacao')) @if($errors->has('localizacao')) is-invalid @else is-valid @endif @endif" id="localizacao" name="localizacao" value="{{old('localizacao')}}" placeholder="Localização">
                    @error('localizacao')
                      <div class="invalid-feedback">{{$errors->first('localizacao')}}</div>
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
              <h3 class="card-title" style="color:white">Editar Localização</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('Localizacoes.update',$loc_edit->id)}}" method="post" enctype="multipart/form-data">
              @csrf
              @method('put')
              <div class="card-body">
                <div class="form-group">
                  <label for="localizacao">Localização</label>
                  <input type="text" class="form-control @if($errors->any('localizacao')) @if($errors->has('localizacao')) is-invalid @else is-valid @endif @endif" id="localizacao" name="localizacao" value="{{$loc_edit->localizacao}}" placeholder="localizacao">
                  @error('localizacao')
                    <div class="invalid-feedback">{{$errors->first('localizacao')}}</div>
                  @enderror
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-secondary">Guardar</button>
                <a href="/Localizacoes" class="btn btn-danger">Cancelar</a>
              </div>
            </form>
          </div>
          @endif
        </div>
      </div>
    </div>
  </section>
@endsection