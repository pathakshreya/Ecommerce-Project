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
            <thead>
            <tr align="center"  bgcolor="#FFCA28">
                <th>Image</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Subtotal</th>
                <th>Action</th>
            </tr>
            </thead>
<tbody>
    @php $total = '0'  @endphp
   
            @foreach($addcarts  as $addcart)
            @php
                $sub_total = $addcart['quantity']* $addcart['price'];
                $total += $sub_total;
            @endphp
           
            <tr align="center">
                <th> <img src="{{$addcart->cover_image}}" height="250px" alt="Image"> </th>
                <th style='padding:10px'>{{$addcart->product_name}}</th>   
                <th style='padding:10px'>{{$addcart->quantity}}</th>  
                <th style="padding:10px">{{$addcart->price}}</th>
                <th style = "padding:10px">{{ $addcart['quantity']* $addcart['price'] }}</th>
                <th>
                    <a href="{{url('deletecart', $addcart->id)}}" class="btn btn-danger">Remove</a>
                </th>
            </tr>
            @endforeach
</tbody>
<tfoot>
    <tr>
        <td colspan="center">
            <a href="{{url('/category')}}" class="btn btn-warning">Continue Shopping</a>
        </td>
        <td>
            <td colspan="center"><strong>Total = {{$total}}</strong></td>
        </td>
        <td colspan="5">
            <a href="{{url('/checkout')}}" class="btn btn-success">Proceed to checkout</a>
        </td>
    </tr>
</tfoot>
</table>
</div>
@endsection
