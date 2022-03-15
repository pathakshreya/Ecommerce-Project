@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Add Category</h2>
        <hr>
    </div>
    <div class="card-body">
        <form action="{{url('insert-category')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="container">
                <div class= "col-md-6 mb-3">
                    <label>Category Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter category name">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Slug</label>
                    <input type="text" name="slug" id="slug" class="form-control" placeholder="Enter slug">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Description</label>
                    <textarea name="description" rows="3" class="form-control" placeholder="Enter description"></textarea>
                </div>
            
                <div class="col-md-6 mb-3">
                    <label>Meta Title</label>
                    <input type="text" class="form-control" name="meta_title">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Meta Description</label>
                    <textarea name="meta_description" class="form-control" rows="3" name="meta_description"></textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Meta Keywords</label>
                    <textarea name="meta_keywords" rows="3" class="form-control"></textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Status</label>
                    <input type="checkbox" name="status">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Popular</label>
                    <input type="checkbox" name="popular">
                </div>
                <div class="col-md-6">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('js')
    <script type="text/javascript">
        $(document).ready(function() {
            console.log("ok");
        $("#name").keyup(function(){
            var Text = $(this).val();
            Text = Text.toLowerCase();
            Text = Text.replace(/[^a-zA-Z0-9]+/g,'-');
            $("#slug").val(Text);
        });
    });
    </script>
@endsection