@extends('posts.layouts.layout')
@section('content')
@extends('posts.layouts.navbar')
<div id="app" class="container">
    <h1>{{$item->name}}</h1>
        <div class="row">
            <div class="col-md-6">
                <div class="card mx-3 my-3">
                    <div class="card-body">{{$item->data}}
                        @foreach (json_decode($item->image, true) as $image)
                            
                        @endforeach
                        <img class="card-img-top" src="{{asset('storage/images/' . $image)}}">
                            <h5 class="card-title">name: {{$item->name}}</h5>
                            <p class="card-text">description: {{$item->description}}</p>
                            <p class="card-text">price: {{$item->price}} Dh</p>
                            <p class="card-text">category: {{$item->category->name}}</p>
                            <div class="d-flex justify-content-around">
                                <div>
                                   <a href="{{route('posts.index')}}" class="btn btn-primary btn-sm">home page</a>
                                </div>
                                @if(Auth::user()->id == 1)
                                <div>                                    
                                    <a href="{{route('posts.edit', $item->id)}}" class="btn btn-warning btn-sm">edit</a>                                    
                                </div>                            
                                <form action="{{route('posts.destroy', ['post' => $item->id])}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete Item</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">are you sure</div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-success btn-sm" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-danger btn-sm">confirm delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal">
                                        delete
                                    </button>
                                </form>
                                @endif                                                           
                            </div>                        
                            <form action="{{route('cart.store')}}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" value="{{ $item->id }}" id="id" name="id">
                                <input type="hidden" value="{{ $item->name }}" id="name" name="name">
                                <input type="hidden" value="{{ $item->price }}" id="price" name="price">
                                <input type="hidden" value="{{ $image }}" id="image" name="image">                                    
                                <input type="hidden" value="{{ $item->description }}" id="description" name="description">
                                <input type="hidden" value="1" id="quantity" name="quantity">
                                <div class="card-footer d-flex justify-content-around" style="background-color: white;">
                                    <button type="submit" class="btn btn-secondary btn-sm">add to card <i class="fas fa-shopping-cart"></i></button>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                @foreach (json_decode($item->image, true) as $image)
                <div class="card mx-3 my-3" style="width: 16rem;">
                    <div class="card-body">
                        <a class="example-image-link" href="{{asset('storage/images/' . $image)}}" data-lightbox="roadtrip"><img class="card-img-top" src="{{asset('storage/images/' . $image)}}"></a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="row mb-3">
            @forelse ($randomItem as $randomItems)                     
              @foreach (json_decode($randomItems->image, true) as $image)
                  {{-- this loop for showing the first img of items --}}
              @endforeach
                <div class="col-lg-3 col-md-6 col-sm-2 mb-4 m-auto">
                  <div class="card h-100">
                    <a href="{{url('posts/'. $randomItems->id)}}"><img class="card-img-top" src="{{asset('storage/images/' . $image)}}"></a>
                    <div class="card-body text-center">
                      <h4 class="card-title">
                        <a href="{{url('posts/'. $randomItems->id)}}">{{$randomItems->name}}</a>
                      </h4>
                      <h5>${{$randomItems->price}}</h5>
                    </div>
                    <div class="card-footer">
                      <form action="{{route('cart.store')}}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" value="{{ $randomItems->id }}" id="id" name="id">
                        <input type="hidden" value="{{ $randomItems->name }}" id="name" name="name">
                        <input type="hidden" value="{{ $randomItems->price }}" id="price" name="price">
                        <input type="hidden" value="{{ $randomItems }}" id="image" name="image">                                    
                        <input type="hidden" value="{{ $randomItems->description }}" id="description" name="description">
                        <input type="hidden" value="1" id="quantity" name="quantity">                                                    
                        <button type="submit" class="btn btn-secondary btn-sm">add to card <i class="fas fa-shopping-cart"></i></button>                                                    
                      </form>
                    </div>
                  </div>              
                </div>
                @empty
                    <div class="col-md-12 col-sm-6 text-center alert alert-danger" role="alert">no related item to show</div>
              @endforelse            
          </div>
        <add-comment :userid="{{Auth::user()->id}}" :itemid="{{$item->id}}"></add-comment>
        <get-comments :userid="{{Auth::user()->id}}" :itemid="{{$item->id}}"></get-comments>             
</div>
@endsection
