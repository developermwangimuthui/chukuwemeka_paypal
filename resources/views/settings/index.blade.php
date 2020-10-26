@extends('layouts.app')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Paypal Settings</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
              <button type="button" class="btn  btn-outline-success" data-toggle="modal" data-target="#modal-default">
                  Add Paypal Settings
                 </button>
                   </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <section class="content">
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Paypal Settings </h3>

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
              <th>ClientID</th>
              <th>ClientSecret</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($settings as $setting)
            <tr>
              <td>{{$setting->paypal_client_id}}</td>
              <td>{{$setting->paypal_secret}}</td>
              <td>
              <a href="{{route('settings.edit',$setting->id)}}" class="btn btn-info">Edit</a>
              <a href="{{route('settings.destroy',$setting->id)}}" class="btn btn-warning">Delete</a>
            </td>
            </tr>
                @endforeach


            </tbody>
            <tfoot>
            <tr>

                <th>ClientID</th>
                <th>ClientSecret</th>
                <th>Action</th>
            </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      </section>
</div>









<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add Paypal Credentials</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form role="form" action="{{route('settings.store')}}" method="POST">
            @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="service">ClientID</label>
                    <input type="text" class="form-control" id="service" placeholder="Enter ClientID Name" name="client_id">
                  </div>
                  <div class="form-group">
                    <label for="service">ClientSecret</label>
                    <input type="text" class="form-control" id="service" placeholder="Enter ClientSecret Name" name="client_secret">
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
