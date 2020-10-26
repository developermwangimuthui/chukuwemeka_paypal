@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Orders</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">Orders</li>
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
                            <h3 class="card-title">Orders</h3>

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
                                    <th>Customer Name</th>
                                    <th>Order Total	</th>
                                    <th>Date Purchased</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{$order->first_name."  ".$order->last_name}}</td>
                                        <td>{{$order->amount}}</td>
                                        <td>{{date('m/d/Y', strtotime($order->date_created))}}</td>
                                        <td>
                                           <?php

                                    $status = App\Models\OrderStatusHistory::where('order_id',$order->id)->orderBy('created_at', 'desc')->pluck('order_status')->first();
                                    $status_name = App\Models\OrderStatusDescription::where('id',$status)->pluck('orders_status_name')->first();


                                            ?>

                                            @if ($status_name=="Pending")
                                            <span class="badge bg-warning">Pending</span>
                                            @elseif($status_name == "Cancel")
                                            <span class="badge bg-primary">Cancelled</span>
                                            @elseif($status_name == "Return")
                                            <span class="badge bg-danger">Returned</span>
                                            @elseif($status_name == "Completed")
                                            <span class="badge bg-success">Completed</span>
                                            @endif
                                            </td>
                                        <td>
                                            <a href="{{route('order.show',$order->id)}}" class="fas fa-edit"   data-toggle="tooltip" title="View Order"></a> &nbsp;&nbsp;
                                            &nbsp; &nbsp; <a href="{{route('order.destroy',$order->id)}}" class="fas fa-trash"   data-toggle="tooltip" title="Delete Order"></a>
                                        </td>
                                    </tr>
                                @endforeach


                                </tbody>
                                <tfoot>
                                <tr>

                                    <th>Customer Name</th>
                                    <th>Order Total	</th>
                                    <th>Date Purchased</th>
                                    <th>Status</th>
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
