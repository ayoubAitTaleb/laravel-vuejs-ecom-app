@extends('posts.layouts.layout')
@section('content')
@extends('posts.layouts.navbar')
<div class="container">
    <h1>create item</h1>
    <form action="{{url('/posts')}}" method="post" class="form-group" enctype="multipart/form-data">
        @csrf
        <label>name</label>
            <input class="form-control" type="text" name="name" id="">
            @error('name')
                <div class="sm alert alert-danger">{{ $message }}</div>
            @enderror
        <label>description</label>
            <input class="form-control" type="text" name="description" id="">
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        <label>price</label>
            <input class="form-control" type="number" name="price" id="">
            @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        <label>category</label>
        <select class="form-control form-control-sm" name="category_id">
            @foreach ($category as $categories)
                <option value="{{$categories->id}}">{{$categories->name}}</option>
            @endforeach
            @error('category_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </select>
        <label>image</label>
            <input class="form-control" multiple type="file" name="image[]" id="images">
            @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button class="btn btn-success btn sm mt-2" type="submit">save</button>
    </form>
</div>
@endsection 