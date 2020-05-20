@extends('Admin.Layouts.home')

@section('content')
<section class="content">
    <h1>Professores</h1>
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Adicionar Professores</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form">
              <div class="card-body">
                <div class="form-group">
                  <label>Numero de Processo</label>
                  <input type="text" class="form-control" placeholder="Enter ...">
                </div>
                <div class="form-group">
                  <label>Nome</label>
                  <input type="text" class="form-control" placeholder="Enter ...">
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control" placeholder="Enter ...">
                </div>
                <div class="form-group">
                  <label>Senha</label>
                  <input type="password" class="form-control" placeholder="Enter ...">
                </div>
                <div class="form-group">
                  <label>Função</label>
                  <select class="form-control">
                    <option>Professor</option>
                    <option>Equipa Tic</option>
                    <option>Administrador</option>
                  </select>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
  </section>
@endsection