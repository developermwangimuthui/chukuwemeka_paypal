@extends('layouts.app')
@section('content')
@foreach ($orders as $order)
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Invoice</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Invoice</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
                <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                    @if (Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}} </div>
                     @elseif(Session::has('error'))
                     <div class="alert alert-error">{{Session::get('error')}}</div>
                     @endif
                </div>
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> Order ID # {{$order->order_number}}
                    .
                  <small class="float-right">Ordered Date :{{ date('m/d/Y', strtotime($order->date_created)) }} </small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  Customer Infor
                  <address>
                    <strong>{{$order->first_name."  ".$order->last_name}}</strong><br>
                    Email:  {{$order->email}}
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">


                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">

                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Qty</th>
                      <th>Service Name	</th>
                      <th>Description</th>
                      <th>Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>1</td>
                      <td>
                        @if ($order->service_description == null ||$order->service_description =='')
                            {{$order->service_name}}
                        @else
                            {{$order->service_description}}
                        @endif
                        </td>
                    <td>{{$order->service_description}}</td>
                      <td>
                        @if($order->currency_type == 'USD')
                                    $
                                @endif
                                @if($order->currency_type == 'EUR')
                                    €
                                @endif
                                @if($order->currency_type == 'GBP')
                                    £
                                @endif
                        {{$order->amount}}</td>
                    </tr>

                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="lead">Payment Methods:</p>
                  <img src="/theme/dist/img/credit/paypal2.png" alt="Paypal">


                </div>
                <!-- /.col -->
                <div class="col-6">

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>@if($order->currency_type == 'USD')
                            $
                        @endif
                        @if($order->currency_type == 'EUR')
                            €
                        @endif
                        @if($order->currency_type == 'GBP')
                            £
                        @endif
                {{$order->amount}}</td>
                      </tr>
                      <tr>
                        <th>Tax:</th>
                        <td>@if($order->currency_type == 'USD')
                            $
                        @endif
                        @if($order->currency_type == 'EUR')
                            €
                        @endif
                        @if($order->currency_type == 'GBP')
                            £
                        @endif
               0</td>
                      </tr>
                      <tr>
                        <th>Shipping:</th>
                        <td>@if($order->currency_type == 'USD')
                            $
                        @endif
                        @if($order->currency_type == 'EUR')
                            €
                        @endif
                        @if($order->currency_type == 'GBP')
                            £
                        @endif
                0</td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td>@if($order->currency_type == 'USD')
                            $
                        @endif
                        @if($order->currency_type == 'EUR')
                            €
                        @endif
                        @if($order->currency_type == 'GBP')
                            £
                        @endif
                {{$order->amount}}</td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                <a href="{{route('downloadPdf',$order->id)}}" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF</a>


                </div>
              </div>

<hr>

            <form  method="POST" action="{{route('order_status.update',$order->id)}}">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="status">Change Status</label>
                    <select name="status" id="status" class="form-control" required>
                        <option value="">Select status</option>
                        @foreach ($order_statuses as $order_status)


                    <option value="{{$order_status->id}}">{{$order_status->orders_status_name}}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="comments">Comments</label>
                    <textarea name="comments" id="" cols="30" rows="10" class="form-control"></textarea>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer ">
                  <a href="submit" class="btn btn-primary">Back</a>
                  <button type="submit" class="btn btn-success  float-right">Submit</button>
                </div>
              </form>



              <hr>


              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Order History</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Date</th>
                        <th>Status</th>
                        <th >Comments</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($order_status_histories as $order_status_history)
                      <tr>
                        <td>{{date('m/d/Y', strtotime($order_status_history->date_created))}}</td>
                        <td>
                            @if ($order_status_history->orders_status_name=="Pending")
                            <span class="badge bg-warning">Pending</span>
                            @elseif($order_status_history->orders_status_name == "Cancel")
                            <span class="badge bg-primary">Cancelled</span>
                            @elseif($order_status_history->orders_status_name == "Return")
                            <span class="badge bg-danger">Returned</span>
                            @elseif($order_status_history->orders_status_name == "Completed")
                            <span class="badge bg-success">Completed</span>
                            @endif
                        </td>
                        <td>
{{$order_status_history->comments}}
                        </td>
                        <td></td>
                      </tr>


                      @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>


            </div>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


@endforeach
@endsection
