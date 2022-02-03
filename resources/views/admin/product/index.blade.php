@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Products List</h2>
    </div>
    <div class="card-body">
    <div class="row">
            <table class="table table-bordered table-striped">
                <tr>
                    <th>Id</th>
                    <th>Category Name</th>
                    <th>Product Name</th>
                    <th>Selling Price</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Action</th>
                    
                </tr>
                @foreach ($products as $product) 
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->category->name}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->selling_price}}</td>
                    <td>{{$product->description}}</td>
                    <td><img src="{{$product->cover_image}}" width="120px" alt="Image"></td>
                    <td style="padding-top:50px"> 
                        <a href="{{url('edit-product', $product->id)}}" class="btn btn-success">Edit</a>
                        <a href="{{url('destroy', $product->id)}}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection