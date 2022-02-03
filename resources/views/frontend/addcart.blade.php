@extends('layouts.front')
@section('title')
@section('content')

<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">Collections / My Cart</h6>
    </div>
</div>

<div class="container">
    
        <table class="table table-bordered">
            <tr align="center"  bgcolor="#FFCA28">
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Subtotal</th>
                <th>Action</th>
            </tr>
            @foreach($addcarts  as $addcart)
            <tr align="center">
                <th style='padding:10px'>{{$addcart->product->name}}</th>
                <th style='padding:10px'>{{$$addcart->quantity}}</th>
                <th style="padding:10px">{{$addcart->product->price}}</th>
                <th style="padding:10px">kkfl</th>
                <th>
                    <a href="{{url('deleteCart', $addCart->id)}}" ></a>
                </th>
            </tr>
            @endforeach
</table>
</div>
@endsection
