@extends('posts.layouts.layout')
@section('content')
@extends('posts.layouts.navbar')
<div class="container">
    <h1>categories list</h1>      
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">category id</th>
                <th scope="col">category name</th>
                <th scope="col">description</th>
                <th scope="col">product count</th>
                <th scope="col">action</th>
            </tr>
            </thead>
            <tbody>            
            @foreach ($categories as $category)
            <tr>
                <th scope="row">{{$category->id}}</th>
                <td>{{$category->name}}</td>
                <td>{{$category->description}}</td>
                <td>{{$category->items_count}}<td>
                <a href="{{url('/category/' . $category->id . '/edit')}}" class="btn btn-warning btn-sm">edit</a>
                <form action="{{url('category/' . $category->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm mt-2" type="submit">delete</button>
                </form>
                </td>
            </tr>
            @endforeach            
            </tbody>
        </table>
</div>
@endsection
