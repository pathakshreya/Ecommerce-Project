@extends('layouts.front')

@section('title')
      Welcome to E-shop
@endsection

@section('content')
    @include('layouts.inc.slider')
    <div class="py-5">
        <div class="container">
            <div class="row">
                   <h1 class="text-center fw-bold">Featured Products</h1>
                   <div class="owl-carousel owl-theme">
                       @foreach($featured_products as $prod)
                       <div class="item">
                            <div class="col-md-11">
                                <div class="card border-1 shadow">
                                    <img src="{{$prod->cover_image}}" height="250px"  alt="Image">
                                    <div class="card-body">
                                        <h5>{{$prod->name}}</h5>
                                        <span class="float-start">Rs {{$prod->selling_price}}</span>
                                        <span class="float-end"><s>Rs {{$prod->original_price}}</s></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                      @endforeach
                </div>
           </div>
     </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="row">
            <h1  class="text-center fw-bold">Trending Categories</h1>
             <div class="owl-carousel owl-theme">
                @foreach ($trending_category as $tcategory)
                <div class="item">
                <a href="{{url('view-category/'.$tcategory->slug)}}">
                    <div class="col-md-11">
                       <div class="card border-1 shadow">
                        <img src="{{$tcategory->cover_image}}" height="250" alt="Image">
                        <h2>{{$tcategory->name}}</h2>
                        <p>
                            {{$tcategory->description}}
                        </p>
                    </div>
                    </div>
</a>
                    </div>
                @endforeach
             </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script>
    $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    dots:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})
</script>
    
@endsection


