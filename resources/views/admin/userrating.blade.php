@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="card-header">
        <h2>User Rating List</h2>
        <hr>
    </div>
<div class="row">
    <div class="card-body">
        <table class="table table-bordered table-striped table-sm">
                    <tr class="tr-sm">
                        <th>User</th>
                        <th>Product</th>
                        <th>Stars Ratings</th>
                        <th class="col-sm-1">Delete</th>
                    </tr>
                    @foreach ($ratings as $item)
                    <tr>
                        <td>{{$item->user_id}}</td>
                        <td>{{$item->prod_id}}</td>
                        <td>{{$item->stars_rated}}</td>
                        <td style="padding-top:40px">
                        <form action="{{url('/deleterating', $item->id)}}" method="get">
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
</div>
@endsection



