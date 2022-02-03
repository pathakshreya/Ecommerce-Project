@extends('layouts.front')

@section('title')
{{$category->name}}
@endsection

@section('content')

<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">Collections / {{$category->name}}</h6>
    </div>
</div>
<div class="py-5">
        <div class="container">
            <h1 class="text-center fw-bold">{{$category->name}}</h1>
            <div class="row">
                       @foreach($products as $prod)
                            <div class="col-md-3 mb-3">
                                <a href="{{url('category/'. $category->slug.'/'.$prod->slug) }}">
                                <div class="card border-1 shadow">
                                    <img src="{{$prod->cover_image}}" height="250px"  alt="Image">
                                    <div class="card-body">
                                        <h5>{{$prod->name}}</h5>
                                        <span class="float-start">Rs {{$prod->selling_price}}</span>
                                        <span class="float-end"><s>Rs {{$prod->original_price}}</s></span>
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