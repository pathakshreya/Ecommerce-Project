@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Category List</h2>
        <hr>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped table-sm">
            <tr class="tr-sm">
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address 1</th>
                <th>Address 2</th>
                <th>Pincode</th>
                <th>City</th>
                <th>State</th>
                <th>Country</th>
                <th>Tracking No</th>
                <th class="col-sm-1">Delete</th>
            </tr>
        @foreach ($orders as $order)
            <tr>
                <td>{{$order->first_name}} {{$order->last_name}}</td>
                <td>{{$order->email}}</td>
                <td>{{$order->phone}}</td>
                <td>{{$order->address1}}</td>
                <td>{{$order->address2}}</td>
                <td>{{$order->pincode}}</td>
                <td>{{$order->city}}</td>
                <td>{{$order->state}}</td>
                <td>{{$order->country}}</td>
                <td>{{$order->tracking_no}}</td>
                    <td style="padding-top:40px">
                        <form action="{{url('/delete', $order->id)}}" method="get">
                            @csrf
                            @method('DELETE')
                            <button type = "submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
            </tr>
           @endforeach
        </table>
    </div>
</div>
@endsection


