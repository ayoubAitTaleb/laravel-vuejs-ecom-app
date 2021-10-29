@extends('posts.layouts.layout')
@section('content')
@extends('posts.layouts.navbar')
    <div class="container">
        <h1>Edit Category</h1>
        <form action="{{route('category.update', $categories->id)}}" method="POST" class="form-group">
            @csrf
            {{ method_field('PUT') }}
            <label>name</label>
                <input class="form-control" type="text" name="name" value="{{$categories->name}}">
            <label>description</label>
                <input class="form-control" type="text" name="description" value="{{$categories->description}}">
            <button class="btn btn-success btn sm mt-2" type="submit">update</button>    
        </form>
    </div>
@endsection