@extends('Admin.Layouts.home')

@section('content')
<section class="content">
    <h1>Localizacoes</h1>
    <div class="container-fluid">
      <div class="row">
        <div class="col-7">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Lista De salas(localizações)</h3>
            </div>
            <div class="card-body">
               @foreach ($locS as $loc)
               <div class="callout callout-success">
               <div class="row">
                <div class="col-9">
                  <h3>{{$loc->localizacao}}</h3>
                  </div>
                  <div class="col-3">
                       <div class="row">
                       <a href="/Localizacoes/{{$loc->id}}/edit" class="btn btn-warning mr-2">Editar</a> 
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
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Nova Localização</h3>
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
                <button type="submit" class="btn btn-primary">Submit</button>
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
                <button type="submit" class="btn btn-primary">Subemeter</button>
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