@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Category List</h2>
        <hr>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
           
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Image</th>
                <th>Edit</th>  
                <th>Delete</th>
            </tr>
        
             @foreach ($categories as $category)
            <tr>
                <td>{{$category->name}}</td>
               
                <td>{{$category->description}}</td>
                <td><img src="{{$category->cover_image}}"  width="120px" alt="Image"></td>
              
                <td>
                <a class="btn btn-success" href="{{url('edit', $category->id)}}">Update</a>
                
</td>
<td style="padding-top:40px">
                   <form action="{{url('/delete-category', $category->id)}}" method="post">
                       @csrf
                       @method('DELETE')
                       <button type = "submit" class="btn btn-danger">Delete</button>
                    </form>
                    </td>
            </tr>
            @endforeach
          
        </table>
    </div>
</div>
@endsection


