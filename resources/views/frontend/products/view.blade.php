@extends('layouts.front')

@section('title', $products->name)

@section('content')

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <form action="{{url('add-rating')}}" method="POST">
        @csrf
        <input type="hidden" name="product_id" value="{{$products->name}}">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Rate {{$products->name}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
              <div class="rating-css">
                        <div class="star-icon">
                            <input type="radio" value="1" name="product_rating" checked id="rating1">
                            <label for="rating1" class="fa fa-star"></label>
                            <input type="radio" value="2" name="product_rating" id="rating2">
                            <label for="rating2" class="fa fa-star"></label>
                            <input type="radio" value="3" name="product_rating" id="rating3">
                            <label for="rating3" class="fa fa-star"></label>
                            <input type="radio" value="4" name="product_rating" id="rating4">
                            <label for="rating4" class="fa fa-star"></label>
                            <input type="radio" value="5" name="product_rating" id="rating5">
                            <label for="rating5" class="fa fa-star"></label>
                        </div>
                    </div>
              </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
    </form>
    </div>
  </div>
</div>

<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">Collections / {{$products->category->name}} / {{$products->name}}</h6>
    </div>
</div>

  <div class="container">
      <div class = "card shadow product_data">
        <div class = "card-body">
            <div class="row">
                <div class="col-md-4 border-right">
                <img src="{{$products->cover_image}}" height="250px" width="250px"  alt="Image">
                </div>
                <div class="col-md-8">
                    <h2 class="mb-0">
                        {{$products->name}}
                        @if($products->trending == '1')
                        <label style="font-size:16px;" class="float-end badge bg-danger trending_tag">Trending</label>
                        @endif
                    </h2>
                     <hr>
                     <label class="me-3">Original Price : <s>Rs {{$products->original_price}}</s></label>
                     <label class="fw-bold">Selling Price : Rs {{$products->selling_price}}</label>
                     <p class="mt-3">
                         {!! $products->small_description !!}
                     </p>
                    <hr> 
                    @if($products->quantity > 0)
                    <label class = "badge bg-success">In stock</label>
                    @else
                    <label class="badge bg-danger">Out of stock</label>
                    @endif
                    <br/>
                    <div class="row mt-2">
                        <div class="col-md-2">
                            <input type="hidden" value="{{ $products->id}}" class="prod_id">

                           {{--AJAX Jquery --}}
                           {{--<div class="input-group text-center mb-3">
                                <button class="input-group-text decrement-btn">-</button>
                                <input type="text" name="quantity" value="1" class="form-control qty-input text-center"/>
                                 <button class="input-group-text increment-btn">+</button>
                            </div>--}}
                        </div>
                        <div class="col-md-12">
                            <div class="buy-now d-flex align-items-center align-self-center">
                                <form method="POST" action="{{url('/addcart', $products->id)}}">
                                    @csrf
                                    @method('POST')
                                    @if($products->quantity > 0)
                                    <input class="btn btn-primary me-3 float-start" type="submit" value="Add to cart" >
                                    @endif
                                    {{--<a href="{{url('/addwishlist')}}" class="btn btn-success me-3 float-start">Add to wishlist<i class="fa fa-heart"></i></a>--}}
                                    
                                    <div class="d-flex align-items-center align-self-center">
                                    <label class="mx-2" for="Quantity">Quantity</label>
                                    <input type="number" value="1" max="10" min="1" class="form-control" style="width:100px" name="quantity">
                                    </div>
                                 </form>
                            
                                    <form method="POST" action="{{url('/addwishlist', $products->id)}}">
                                        @csrf 
                                        @method('POST')
                                        <input class="btn btn-success me-3 float-start" type="submit" value="Add to wishlist">
                            
                                    </form>

                               
                                {{--<a href="{{url('/cart')}}" class="btn btn-primary me-3 float-start">Add to cart<i class="fa fa-shopping-cart"></i></a>--}}
                            
                           </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
                  <h4>Description</h4>
                  <p>{{$products->description}}</p>
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Rate this product</button>
          </div>
      </div>
  </div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $('.increment-btn').click(function (e){
            e.preventDefault();

            var inc_value = $('.qty-input').val();
            var value = parseInt(inc_value, 10);
            value = isNaN(value) ? 0 : value;
            if(value < 10)
            {
                value++;
                $('.qty-input').val(value);
            }
        });

        $('.decrement-btn').click(function (e){
            e.preventDefault();

            var dec_value = $('.qty-input').val();
            var value = parseInt(dec_value, 10);
            value = isNaN(value) ? 0 : value;
            if(value > 1)
            {
                value--;
                $('.qty-input').val(value);
            }
        });
    });
</script>
@endsection
