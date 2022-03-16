@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="card-header">
        <h2>Registered User List</h2>
        <hr>
    </div>
<div class="row">
    <div class="card-body">
        <table class="table table-bordered table-striped table-sm">
                    <tr class="tr-sm">
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th class="col-sm-1">Details</th>
                    </tr>
                      @foreach ($users as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->email}}</td>
                <td>
                    <a href="{{url('detail', $item->id)}}" class="btn btn-info btn-sm">View</a>
                </td>
            </tr>
          @endforeach
        </table>
    </div>
</div>
</div>
@endsection



