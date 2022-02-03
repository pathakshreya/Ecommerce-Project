@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Update Category</h2>
    </div>
    <div class="card-body">
            <form method="POST" action="{{url('update-category', $category->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
            <div class="container">
                <div class= "col md-6 mb-3">
                    <label>Category Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $category->name)}}">
                </div>

                <div class="col md-6 mb-3">
                    <label>Slug</label>
                    <input type="text" name="slug" class="form-control" placeholder="Enter slug" value="{{ old('slug', $category->slug)}}">
                </div>

                <div class="col md-12 mb-3">
                    <label>Description</label>
                    <textarea name="description" rows="3" class="form-control">{{$category->description}}</textarea>
                </div>
            
                <div class="col md-6 mb-3">
                    <label>Meta Title</label>
                    <input type="text" class="form-control" name="meta_title" value="{{ old('meta_title', $category->meta_title)}}">
                </div>
                <div class="col md-12 mb-3">
                    <label>Meta Description</label>
                    <textarea name="meta_description" class="form-control" rows="3" name="meta_description">{{$category->meta_description}}</textarea>
                </div>
                <div class="col md-6 mb-3">
                    <label>Meta Keywords</label>
                    <textarea name="meta_keywords" rows="3" class="form-control">{{$category->meta_keywords}}</textarea>
                </div>
                <div class="col md-6 mb-3">
                    <label>Status</label>
                    <input type="checkbox" name="status"  value= "{{ $category-> status == '1' ? 'checked':''}}" >
                </div>
                <div class="col md-6 mb-3">
                    <label>Popular</label>
                    <input type="checkbox" name="popular" value= "{{ $category-> popular == '1' ? 'checked':''}}">
                </div>
                <div class="col md-12">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="col md-12">
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection