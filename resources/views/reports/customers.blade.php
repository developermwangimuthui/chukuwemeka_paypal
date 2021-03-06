@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Customers Orders Reports</h1>
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
              <h3 class="card-title">Customers Orders Reports</h3>

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
                  <th>Customer Name	</th>
                  <th>Email</th>
                  <th>Total Purchased  in (EUR)</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($customer_reports as $customer_report)
                    <tr>
                    <td>{{$customer_report->first_name."  ".$customer_report->last_name}}</td>

                    <td>{{$customer_report->email}}</td>
                    <td> {{number_format(floatval($customer_report->converted_amount),2)}} EUR </td>
                    </tr>
                    @endforeach


                </tbody>
                <tfoot>
                <tr>

                    <th>Customer Name	</th>
                  <th>Email</th>
                    <th>Total Purchased</th>
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

@endsection
