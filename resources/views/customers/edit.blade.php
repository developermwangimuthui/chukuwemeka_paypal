@extends('layouts.app')
@section('content')

<div class="content-wrapper">
    @foreach ($customers as $customer)
    <form role="form" action="{{route('customer.update')}}" method="POST">
        @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="fname">First Name</label>
              <input type="text" class="form-control" id="fname" placeholder="Enter First Name" name="fname" value="{{$customer->first_name}}">
              </div>
              <div class="form-group">
                <label for="lname">Last Name</label>
                <input type="text" class="form-control" id="lname" placeholder="Enter Last Name" name="lname" value="{{$customer->last_name}}">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" placeholder="Enter Email" name="email" value="{{$customer->email}}">
              </div>
            <input type="hidden" name="id" value="{{$customer->id}}">
              <div class="form-group">
                <label for="gender">Gender</label>
                <select name="gender" id="gender" class="form-control">

                    @if ($customer->customers[0]->gender == "male")

                    <option value="male">Male</option>
                    @elseif($customer->customers[0]->gender == "female")

                    <option value="female">Female</option>

                    @else
                    <option value="">Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    @endif

                </select>
              </div>
              <div class="form-group">
                <label for="phone">Telephone</label>
                <input type="text" class="form-control" id="phone" placeholder="Enter Phone Number" name="phone" value="{{$customer->customers[0]->phone}}">
              </div>
              <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" placeholder="Enter Address" name="address" value="{{$customer->customers[0]->address}}">
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
