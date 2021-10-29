@extends('posts.layouts.layout')
@section('content')
@extends('posts.layouts.navbar')
    <div class="container">
        <h1>create post</h1>
            <form action="{{route('posts.update', $item->id)}}" method="POST" class="form-group">
                @csrf
                {{ method_field('PUT') }}
                <label>name</label>
                    <input class="form-control" type="text" name="name" value="{{$item->name}}">
                @error('name')
                    <div class="sm alert alert-danger">{{ $message }}</div>
                @enderror
                <label>description</label>
                    <input class="form-control" type="text" name="description" value="{{$item->description}}">
                @error('description')
                    <div class="sm alert alert-danger">{{ $message }}</div>
                @enderror
                <label>price</label>
                    <input class="form-control" type="number" name="price" value="{{$item->price}}">
                @error('price')
                    <div class="sm alert alert-danger">{{ $message }}</div>
                @enderror
                <label>category</label>
                <select class="form-control form-control-sm" name="category_id">
                    <option value="{{$item->category_id}}">{{$item->category->name}}</option>
                        @foreach ($category as $categories)
                            <option value="{{$item->category_id = $categories->id}}">{{$categories->name}}</option>        
                        @endforeach   
                </select>
                <button class="btn btn-success btn sm mt-2" type="submit">update</button>    
            </form>
    </div>
@endsection