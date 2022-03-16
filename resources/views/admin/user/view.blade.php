@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="card-header">
        <h2>User Details</h2>
        <hr>
    </div>
<div class="row">
    <div class="card-body">
      <div class="row">
          <div class="col-md-4">
              <label for="">First Name</label>
              <div class="p-2 border">{{$users->name}}</div>
              </div>
              <div class="col-md-4">
                  <label for="">Email</label>
                  <div class="p-2 border">{{$users->email}}</div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
@endsection



