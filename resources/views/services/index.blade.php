@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Services</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <button type="button" class="btn  btn-outline-success" data-toggle="modal" data-target="#modal-default">
                Add Service
               </button>
                 </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">


          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Services</h3>

               @if (Session::has('success'))
              <div class="alert alert-success">{{Session::get('success')}} </div>
               @elseif(Session::has('error'))
               <div class="alert alert-error">{{Session::get('error')}}</div>
               @endif
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Service</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($services as $service)
<tr>
                  <td>{{$service->service_name}}</td>
                  <td>
                  <a href="{{route('service.edit',$service->id)}}" class="btn btn-info">Edit</a>
                  <a href="{{route('service.destroy',$service->id)}}" class="btn btn-warning">Delete</a>
                </td>
                </tr>
                    @endforeach


                </tbody>
                <tfoot>
                <tr>

                    <th>Service</th>
                    <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>



{{-- modals --}}

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add Service</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form role="form" action="{{route('service.store')}}" method="POST">
            @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="service">Service</label>
                    <input type="text" class="form-control" id="service" placeholder="Enter Service Name" name="service">
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

@endsection
