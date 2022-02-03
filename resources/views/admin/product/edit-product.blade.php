@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Update Products</h2>
        <hr>
    </div>
    <div class="card-body">
        <form action="{{url('/update', $product->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="container">
                <div class="col-md-6 mb-3">
                    <select class="form-control" name="category_id" aria-label="Default select example">
                        <option value="">Select the category</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Products Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $product->name)}}">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Slug</label>
                    <input type="text" name="slug" class="form-control" value="{{ old('slug', $product->slug)}}">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Small Description</label>
                    <textarea name="small_description" rows="3" class="form-control">{{$product->small_description}}</textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Description</label>
                    <textarea name="description" rows="3" class="form-control" placeholder="Enter description"></textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Original Price</label>
                    <input type="text" name="original_price" class="form-control" value="{{ old('original_price', $product->original_price)}}">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Selling Price</label>
                    <input type="text" name="selling_price" class="form-control" value="{{ old('selling_price', $product->selling_price)}}">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Tax</label>
                    <input type="text" name="tax" class="form-control" value="{{ old('tax', $product->tax)}}">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Quantity</label>
                    <input type="number" name="quantity" class="form-control" value="{{ old('quantity', $product->quantity)}}">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Status</label>
                    <input type="checkbox" name="status">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Trending</label>
                    <input type="checkbox" name="trending">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Meta Title</label>
                    <input type="text" class="form-control" name="meta_title" value="{{ old('meta_title', $product->meta_title)}}">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Meta Description</label>
                    <textarea name="meta_description" class="form-control" rows="3" name="meta_description">{{$product->meta_description}}</textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Meta Keywords</label>
                    <textarea name="meta_keyword" rows="3" class="form-control">{{$product->meta_keyword}}</textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div>
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </div>
        </form>
</div>   
</div>
@endsection