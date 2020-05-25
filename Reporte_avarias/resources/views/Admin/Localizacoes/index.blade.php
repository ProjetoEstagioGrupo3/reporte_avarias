@extends('Admin.Layouts.home')

@section('content')
<section class="content">
    <h1>Localizacoes</h1>
    <div class="container-fluid">
      <div class="row">
        <div class="col-7">
          <!-- general form elements -->
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
                       <a href="/localizacoes/{{$loc->id}}/editar" class="btn btn-warning mr-2">Editar</a>
                        <a href="" class="btn btn-danger">Eliminar</a>
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

        </div>
      </div>
    </div>
  </section>
@endsection