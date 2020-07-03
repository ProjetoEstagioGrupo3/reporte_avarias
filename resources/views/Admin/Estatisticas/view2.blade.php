@extends('Admin.Layouts.home')

@section('content')
<section>
    <label for="estdao">Tipo de Equipamento</label>
            <select class="form-control" id="estado" name="estado">
                @foreach ($estados as $estado)
                    <option value="{{$estado->id}}" onclick="mostra('{{$estado->id}}')">{{$estado->estado}}</option>
                @endforeach
            </select>
</section>
@endsection