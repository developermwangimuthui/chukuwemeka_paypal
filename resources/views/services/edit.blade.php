@extends('layouts.app')
@section('content')

<div class="content-wrapper">
    @foreach ($services as $service)
    <form role="form" action="{{route('service.update',$service->id)}}" method="POST">
        @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="service">Service</label>
              <input type="text" class="form-control" id="service" placeholder="Enter Service Name" name="service" value="{{$service->service_name}}">
              </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
          @endforeach
</div>
@endsection
