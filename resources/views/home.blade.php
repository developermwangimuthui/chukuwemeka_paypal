@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$orders_count}}</h3>

                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
            <a href="{{route('order.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$customers_count}}</h3>

                <p>Customer Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            <a href="{{route('customer.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$services_count}}</h3>

                <p> Total Services</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            <a href="{{route('service.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  Sales
                </h3>
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto d-flex p-2">
                    <li class="nav-item " style="background-color: #17A2B8">
                      <a class="nav-link active">Cancelled</a>
                    </li>
                    <li class="nav-item " style="background-color: #FFC107">
                      <a class="nav-link" >Pending</a>
                    </li>
                    <li class="nav-item " style="background-color: red;">
                      <a class="nav-link ">Returned</a>
                    </li>
                    <li class="nav-item " style="background-color:green; margin: 2px 2px 2px 2px">
                      <a class="nav-link" >Completed</a>
                    </li>
                  </ul>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="chart">
                    <canvas id="areaChart" style="height: 400px;"></canvas>
                    {{-- <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas> --}}
                  </div>

              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- DIRECT CHAT -->

            <!--/.direct-chat -->

            <!-- TO DO List -->

            <!-- /.card -->
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->

          <!-- right col -->
        </div>
        <div class="row">
          <!-- Left col -->
         <section class="col-lg-7 connectedSortable">




            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">New Orders</h3>


                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Date</th>
                      <th>Customer Name	</th>
                      <th>Total Price in (EUR)</th>
                      <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
            @foreach ($orders as $order)
            <tr>
            <td>{{date('m/d/Y', strtotime($order->date_created))}}</td>
            <td>{{$order->first_name."  ".$order->last_name}}</td>
        <td> {{number_format(floatval($order->converted_amount),2)}} EUR </td>
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
            </tr>
            @endforeach


                    </tbody>
                    <tfoot>
                    <tr>
                       <th>Order ID</th>
                        <th>Customer Name	</th>
                        <th>Total Price</th>
                        <th>Status</th>
                    </tr>
                    </tfoot>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
          </section>
         <section class="col-lg-5 connectedSortable">


            <div class="card">
            <div class="card-header">
                <h3 class="card-title">Recently Added Services</h3>


              </div>
            <div class="card-body">
                <table id="dashboardreports" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Service Name</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($services as $service)
                    <tr>
                        <td>
                        {{$service->service_name}}
                        </td>
                    </tr>
                    @endforeach


                  </tbody>
                  <tfoot>
                  <tr>
                     <th>Service Name</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              </div>

          </section>
        </div>
        <div class="row">
{{--
            <section class="col-lg-7 connectedSortable">

                <div class="progress">
                    <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <div class="progress">
                    <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <div class="progress">
                    <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <div class="progress">
                    <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <div class="progress">
                    <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
            </section> --}}


        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->

    </section>
    <!-- /.content -->
  </div>
<script>
  $(function () {
$(document).ready(function () {

    var Months = new Array();
        var cancelled_orders_count = new Array();
        var completed_orders_count = new Array();
        var pending_orders_count = new Array();
        var returned_orders_count = new Array();
        var maximun_number =10;
        var Data=[];
            $.ajax({
				url: "{{ route('getMonthlyOrdersData') }}",
				method: "GET",
				contentType: false,
				cache: false,
				processData: false,
				dataType: "json",
				success: function (data) {
                                    Data = data;
                                Months.push(data.months);
                                cancelled_orders_count.push(data.cancelled_orders_count);
                                completed_orders_count.push(data.completed_orders_count);
                                pending_orders_count.push(data.pending_orders_count);
                                returned_orders_count.push(data.returned_orders_count);
                                maximun_number = data.max;

                                console.log(Data.months);
                            var areaChartCanvas = $('#areaChart').get(0).getContext('2d'); var areaChartData = {
                            labels  : Data.months,
                            datasets: [
                                {
                                label               : 'Completed Orders',
                                backgroundColor     : 'rgba(0, 200, 0, 1)',
                                borderColor         : 'rgba(0, 200, 0, 0.9)',
                                pointRadius          : false,
                                pointColor          : '#3b8bba',
                                pointStrokeColor    : 'rgba(60,141,188,1)',
                                pointHighlightFill  : '#fff',
                                pointHighlightStroke: 'rgba(60,141,188,1)',
                                data                : Data.completed_orders_count
                                },
                                {
                                label               : 'Returned Orders',
                                backgroundColor     : 'rgba(200, 0, 0, 1)',
                                borderColor         : 'rgba(210, 214, 222, 1)',
                                pointRadius         : false,
                                pointColor          : 'rgba(210, 214, 222, 1)',
                                pointStrokeColor    : '#c1c7d1',
                                pointHighlightFill  : '#fff',
                                pointHighlightStroke: 'rgba(220,220,220,1)',
                                data                : Data.returned_orders_count
                                },
                                {
                                label               : 'Cancelled Orders',
                                borderColor         : 'rgba(210, 214, 222, 1)',
                                backgroundColor     : 'rgb(60, 141, 188)',
                                pointRadius         : false,
                                pointColor          : 'rgba(210, 214, 222, 1)',
                                pointStrokeColor    : '#c1c7d1',
                                pointHighlightFill  : '#fff',
                                pointHighlightStroke: 'rgba(220,220,220,1)',
                                data                : Data.cancelled_orders_count
                                },
                                {
                                label               : 'Pending Orders',
                                borderColor         : 'rgba(210, 214, 222, 1)',
                                backgroundColor     : 'rgba(255, 193, 7)',
                                pointRadius         : false,
                                pointColor          : 'rgba(210, 214, 222, 1)',
                                pointStrokeColor    : '#c1c7d1',
                                pointHighlightFill  : '#fff',
                                pointHighlightStroke: 'rgba(220,220,220,1)',
                                data                : Data.pending_orders_count
                                },
                            ]
                            }

                            var areaChartOptions = {
                            maintainAspectRatio : false,
                            responsive : true,
                            legend: {
                                display: false
                            },
                            scales: {
                                xAxes: [{
                                gridLines : {
                                    display : false,
                                }
                                }],
                                yAxes: [{
                                gridLines : {
                                    display : false,
                                }
                                }]
                            }
                            }

                            // This will get the first returned node in the jQuery collection.
                            var areaChart  = new Chart(areaChartCanvas, {
                            type: 'line',
                            data: areaChartData,
                            options: areaChartOptions
                            });
			}
	});

  });
  });

</script>
@endsection
