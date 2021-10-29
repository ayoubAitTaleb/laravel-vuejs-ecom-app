@extends('posts.layouts.layout')
@section('content')
@extends('posts.layouts.navbar')
<div class="container">
<h1>{{$categories->name}}</h1>
<p>{{$categories->description}}</p>
    <div class="row">
        @foreach ($items_in_category as $items_in_categories)
            <div class="col-sm-4">
                <div class="card mx-3 my-3">
                    <div class="card-body">
                        @foreach (json_decode($items_in_categories->image, true) as $image)
                            {{-- this loop for showing the first img of items --}}
                        @endforeach
                    <img class="card-img-top" src="{{asset('storage/images/' . $image)}}">
                        <h5 class="card-title">name: {{$items_in_categories->name}}</h5>
                        <p class="card-text">information: {{$items_in_categories->description}}</p>
                        <p class="card-text">price: {{$items_in_categories->price}}</p>
                        <p class="card-text">category: {{$items_in_categories->category->name}}</p>
                        <a href="{{url('posts/'. $items_in_categories->id)}}" class="btn btn-primary">show item</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div> 
</div>
@endsection