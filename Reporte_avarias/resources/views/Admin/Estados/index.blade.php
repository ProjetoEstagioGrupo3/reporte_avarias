@extends('Admin.Layouts.home')

@section('content')
  <section class="content">
     <h1>Estado</h1>
     <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Novo Estado</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form">
              <div class="card-body">
                <div class="form-group">
                  <label>Estado</label>
                  <input type="text" class="form-control" placeholder="Enter ...">
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