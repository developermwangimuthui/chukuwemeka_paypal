@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Customers</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <button type="button" class="btn  btn-outline-success" data-toggle="modal" data-target="#modal-default">
                Add Customers
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
              <h3 class="card-title">Customers</h3>

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
                  <th>Full Name</th>
                  <th>Email</th>
                  <th>Additional Information</th>
                  <th>Address</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $customer)
<tr>
                  <td>{{$customer->first_name." ".$customer->last_name}}</td>
                  <td>{{$customer->email}}</td>
                  <td>Phone: &nbsp;&nbsp;   {{$customer->phone}} <br>Gender: &nbsp;  {{$customer->gender}}</td>
                  <td>{{$customer->address}}</td>
                  <td>
                  <a href="{{route('customer.edit',$customer->id)}}" class="btn btn-info">Edit</a>
                  <a href="{{route('customer.destroy',$customer->id)}}" class="btn btn-warning">Delete</a>
                </td>
                </tr>
                    @endforeach


                </tbody>
                <tfoot>
                <tr>

                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Additional Information</th>
                    <th>Address</th>
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
          <h4 class="modal-title">Add Customer</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form role="form" action="{{route('customer.store')}}" method="POST">
            @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="fname">First Name</label>
                    <input type="text" class="form-control" id="fname" placeholder="Enter First Name" name="fname">
                  </div>
                  <div class="form-group">
                    <label for="lname">Last Name</label>
                    <input type="text" class="form-control" id="lname" placeholder="Enter Last Name" name="lname">
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" placeholder="Enter Email" name="email">
                  </div>
                  <div class="form-group">
                    <label for="gender">Gender</label>
                    <select name="gender" id="gender" class="form-control">
                        <option value="">Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="phone">Telephone</label>
                    <input type="text" class="form-control" id="phone" placeholder="Enter Phone Number" name="phone">
                  </div>
                  <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" placeholder="Enter Address" name="address">
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
