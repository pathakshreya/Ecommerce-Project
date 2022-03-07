@extends('layouts.front')
@section('title')
@section('content')

<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">Collections / Checkout</h6>
    </div>
</div>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-7">   
                
            <form action="{{route('place_order.store')}}" method="POST" id="checkoutForm">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <h5>Basic Details</h5>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="first_name">First Name</label>
                                <input type="text" class="form-control" placeholder="Enter first name" name="first_name"></input>
                            </div>
                            <div class="col-md-6">
                                <label for="last_name">Last Name</label>
                                <input type="text" class="form-control" placeholder="Enter last name" name="last_name"></input>
                                @error('last_name')
                                <div class="text-center">
                                    {{message}}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" placeholder="Enter email" name="email"></input>
                                @error('email')
                                <div class="text-center">
                                    {{message}}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="phone">Phone Number </label>
                                <input type="text" class="form-control" placeholder="Enter phone number" name="phone"></input>
                                @error('phone')
                                <div class="text-center">
                                    {{message}}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="address1">Address 1</label>
                                <input type="text" class="form-control" placeholder="Enter first address" name="address1"></input>
                                @error('address1')
                                <div class="text-center">
                                    {{message}}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="address2">Address 2</label>
                                <input type="text" class="form-control" placeholder="Enter second address" name="address2"></input>
                                @error('address2')
                                <div class="text-center">
                                    {{message}}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="city">City</label>
                                <input type="text" class="form-control" placeholder="Enter city" name="city"></input>
                                @error('city')
                                <div class="text-center">
                                    {{message}}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="state">State</label>
                                <input type="text" class="form-control" placeholder="Enter state" name="state"></input>
                                @error('state')
                                <div class="text-center">
                                    {{message}}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="country">Country</label>
                                <input type="text" class="form-control" placeholder="Enter country" name="country"></input>
                                @error('country')
                                <div class="text-center">
                                    {{message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="pincode">Pincode</label>
                            <input type="text" class="form-control" placeholder="Enter pincode" name="pincode"></input>
                            @error('pincode')
                                <div class="text-center">
                                    {{message}}
                                </div>
                                @enderror
                        </div>
                    </div>
                </div>
        </div>
   
          <div class="col-md-5">
              <div class="card">
                  <div class="card-body">
                      <h5>OrderDetails</h5>
                      <hr>
                      <table class="table table-bordered">
                          <thead>
                              <tr align="center"  bgcolor="#FFCA28">
                                  <th>Product Name</th>
                                  <th>Quantity</th>
                                  <th>Price</th>
                                  <th>Sub total</th>
                              </tr>
                          </thead>
                          <tbody>
                          @php $total = '0'  @endphp
                            @foreach($addcarts as $addcart)
                            @php
                                $sub_total = $addcart['quantity']* $addcart['price'];
                                $total += $sub_total;
                            @endphp
                            <tr align="center">
                               <td> {{$addcart->product_name}}</td>
                               <td>{{$addcart->quantity}}</td>
                               <td>{{$addcart->price}}</td>
                               <th style = "padding:10px">{{ $addcart['quantity']* $addcart['price'] }}</th>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan = "5">
                                    <strong>Total = {{$total}}</strong>
                                </td>
                            </tr>
                        </tfoot>
                      </table>
                      <hr>
                      <a href="javascript:void(0)" onclick="$('#checkoutForm').submit()" class="btn btn-primary float-end">Place Order</a>
                  </div>
              </div>
          </div>
    </div>
</div>
@endsection