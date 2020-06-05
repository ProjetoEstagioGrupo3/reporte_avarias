
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
    <label for="codBastidor">Codigo do Bastidor</label>
    <input type="int" class="form-control @if($errors->any('codBastidor')) @if($errors->has('codBastidor')) is-invalid @else is-valid @endif @endif" id="codBastidor" name="codBastidor">
    @error('codBastidor')
      <div class="invalid-feedback">{{$errors->first('codBastidor')}}</div>
    @enderror
</div>
<div class="form-group">
    <label for="ram"> Memoria Ram</label>
    <input type="int" class="form-control @if($errors->any('ram')) @if($errors->has('ram')) is-invalid @else is-valid @endif @endif" id="ram" name="ram">
    @error('ram')
      <div class="invalid-feedback">{{$errors->first('ram')}}</div>
    @enderror
  </div>
      <div class="card-footer">
        <button type="submit" class="btn" style="background-color: #042d6e"><font color="white">Adicionar</font></button>
      </div>
    </form>
  </div>