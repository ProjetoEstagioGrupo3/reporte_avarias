@extends('Admin.Layouts.home')

@section('content')
<section class="content">
    <h1>Tipo Avarías</h1>
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Nova Avaria</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form">
              <div class="card-body">
                <div class="form-group">
                  <label>Nome da Avaria</label>
                  <input type="text" class="form-control" placeholder="Enter ...">
                </div>
                  <div class="form-group">
                    <label>Descrição</label>
                    <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
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