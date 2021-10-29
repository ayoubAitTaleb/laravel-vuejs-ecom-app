@extends('posts.layouts.layout')
@section('content')
@extends('posts.layouts.navbar')
<div class="container">
    <h1>result Page</h1>
        <div class="row">
            <div class="col-md-10">
                <div class="row">
                    @foreach ($result as $results)
                    @foreach (json_decode($results->image, true) as $image)                    
                        {{-- this loop for showing the first img of items --}}
                    @endforeach
                        <div class="card mx-3 my-3" style="width: 16rem;">
                            <div class="card-body">
                                <img class="card-img-top" src="{{asset('storage/images/' . $image)}}">
                                
                                    <h5 class="card-title">name: {{$results->name}}</h5>
                                    <p class="card-text">description: {{Str::limit($results->description, 20, '...') }}</p>
                                    <p class="card-text">price: {{$results->price}}</p>
                                    <p class="card-text">category: {{$results->category->name}}</p>
                                    <a href="{{url('posts/'. $results->id)}}" class="btn btn-primary">show item</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div> 
</div>
@endsection