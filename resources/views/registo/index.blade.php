@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
                <div class="card">
                    <div class="card-header" style="background-color: #042d6e">
                        <h4 class="card-title" style="color:white">Registo de Avarias</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <h5>Os Seus Registos</h5>
                                @foreach ($registo as $reg)
                                    <div class="col-sm-8">
                                        <h5 class="card-title"></h5>
                                        <h6 class="card-subtitle mb-2 text-muted"></h6>
                                        <p class="card-text"></p>
                                    </div>
                                    <div class="col-sm-4">
                                        <a href="/home/{{$reg->id}}/edit" class="btn btn-secondary mr-2"><font color="white">Editar</font></a> 
                                        <form action="{{route('home.destroy',$loc->id)}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger ">Eliminar</button>
                                        </form>
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-sm-6">
                                <form action="{{route('home.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <h5>Registar Avaria</h5>
                                    <br>
                                    <div class="form-group">
                                        <label>Registo feito por:</label>
                                        <input type="text" class="form-control" id="user" name="user" value="{{ Auth::user()->name }}" aria-describedby="emailHelp" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="tipo_avaria">Tipo de Avaria</label>
                                        <select class="form-control" id="tpavaria" name="tpavaria">
                                            @foreach ($tipoavaria as $tpavaria)
                                                <option value="{{$tpavaria->id}}">{{$tpavaria->tipo_avaria}}</option>
                                            @endforeach
                                        </select>
                                        @error('tipo_avaria')
                                            <div class="invalid-feedback">{{$errors->first('tipo_avaria')}}</div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-info">Submit</button>
                                  </form>
                            </div>
                        </div>
                    </div>
                  </div>
            </div>
            <div class="col-sm-1"></div>
        </div>
    </div>
@endsection