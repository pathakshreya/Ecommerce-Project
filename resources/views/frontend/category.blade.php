@extends('layouts.front')

@section('title')
      Category
@endsection

@section('content')
    <div class="py-5">
        <div class="container">
            <h2  class="fw-bold">All Categories</h2>
            <div class="row">
                @foreach($category as $cat)
                    <div class="col-md-4 mb-3">
                        <a href="{{url('view-category/'.$cat->slug)}}">
                        <div class="card">
                             <img src="{{$cat->cover_image}}" height="250px" alt="Image">
                             <div class="card-body">
                                 <h5>{{$cat->name}}</h5>
                                 <p>
                                     {{$cat->description}}
                                 </p>
                             </div>
                        </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection