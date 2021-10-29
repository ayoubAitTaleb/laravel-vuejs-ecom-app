@extends('posts.layouts.layout')
@section('content')
@extends('posts.layouts.navbar')
<div class="container">
    <h1>create post</h1>
    <form action="{{url('/category/')}}" method="post" class="form-group">
        @csrf
        <label>name</label>
            <input class="form-control" type="text" name="name">
        <label>description</label>
            <input class="form-control" type="text" name="description">
        <button class="btn btn-success btn sm mt-2" type="submit">save</button>
    </form>
</div>
@endsection