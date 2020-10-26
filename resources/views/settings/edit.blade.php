@extends('layouts.app')
@section('content')

<div class="content-wrapper">
    @foreach ($settings as $setting)
    <form role="form" action="{{route('settings.update',$setting->id)}}" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
              <label for="service">ClientID</label>
            <input type="text" class="form-control" id="service" placeholder="Enter ClientID " name="client_id" value="{{$setting->paypal_client_id}}">
            </div>
        <input type="hidden" name="id" value="{{$setting->id}}">
            <div class="form-group">
              <label for="service">ClientSecret</label>
            <input type="text" class="form-control" id="service" placeholder="Enter ClientSecret " name="client_secret" value="{{$setting->paypal_secret}}">
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
