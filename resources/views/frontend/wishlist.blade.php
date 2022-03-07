@extends('layouts.front')
@section('title')
@section('content')

<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">Collections / Wishlist</h6>
    </div>
</div>

<div class="container my-5">
    <div class="card shadow">
   
           
   <table class="table table-bordered">
        <thead>
            <tr align = "center" bgcolor="#FFCA28">
                <th>Image</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
@foreach($wishlists as $wishlist)
        <tbody>
            <tr align="center">
                <th> <img src="{{$wishlist->cover_image}}" height="250px" alt="Image"></th>
                <th>{{$wishlist->product_name}}</th>
                <th>{{$wishlist->price}}</th>
                <th>
                    <a href="{{url('/deletewishlist', $wishlist->id)}}" class="btn btn-danger">Remove</a>
                </th>
            </tr>
        </tbody>
        @endforeach
    </table>

    </div>

</div>
@endsection
