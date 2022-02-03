@extends('layouts.front')

@section('title', $products->name)

@section('content')

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
                    <div class="row mt-2">
                        <div class="col-md-2">
                            <input type="hidden" value="{{ $products->id}}" class="prod_id">
                            <label for="Quantity">Quantity</label>
                           <input type="number" value="1" max="10" min="1" class="form-control" style="width:100px" name="quantity">
                           {{--AJAX Jquery --}}
                           {{--<div class="input-group text-center mb-3">
                                <button class="input-group-text decrement-btn">-</button>
                                <input type="text" name="quantity" value="1" class="form-control qty-input text-center"/>
                                 <button class="input-group-text increment-btn">+</button>
                            </div>--}}
                        </div>

                        <div class="col-md-10">
                            <br/>
                            <a href="#" class="btn btn-success me-3 float-start">Add to wishlist<i class="fa fa-heart"></i></a>
                           {{--<a href="{{url('/cart')}}" class="btn btn-primary me-3 float-start">Add to cart<i class="fa fa-shopping-cart"></i></a>--}}

                           <form method="POST" action="{{url('/addcart', $products->id)}}">
                               @csrf
                               @method('POST')
                               <input class="btn btn-primary me-3 float-start" type="submit" value="Add to cart" >
                           </form>
                           
                        </div>
                    </div>
                </div>
            </div>
            <hr>
                  <h4>Description</h4>
                  <p>{{$products->description}}</p>
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
