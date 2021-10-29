@extends('posts.layouts.layout')
@section('content')
@include('posts.layouts.navbar')
<div class="container">
  <div class="row">
    <div class="col-lg-3" style="margin-top: 25px;">
      @if (session()->has('item'))
      <ul class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{{session()->get('item')}}</strong> You should check in on some of those fields below.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </ul>
      @endif
      {{-- categiry list --}}
      <div class="list-group">
        <a class="list-group-item list-group-item-action active">Categories List</a>
          @forelse ($categories as $category)
            <a href="{{ route('category.show', $category->id) }}" class="list-group-item-action list-group-item d-flex justify-content-between align-items-center">{{$category->name}}
                <span class="badge badge-primary badge-pill">{{$category->items_count}}</span>
            </a>
          @empty
            <a class="list-group-item-action list-group-item d-flex justify-content-between align-items-center">no category to show
            </a>
          @endforelse
      </div>

      {{-- most commented items --}}
      <div class="list-group mt-4">
        <a class="list-group-item list-group-item-action active">Most pupular items List</a>
          @forelse ($itemCommented as $itemsCommented)
            <a href="{{ route('posts.show', $itemsCommented->id) }}" class="list-group-item-action list-group-item d-flex justify-content-between align-items-center">{{$itemsCommented->name}}
                <span class="badge badge-primary badge-pill">{{$itemsCommented->comments_count}}</span>
            </a>
          @empty
            <a class="list-group-item-action list-group-item d-flex justify-content-between align-items-center">no items to show
            </a>
          @endforelse
      </div>
    </div>

    @include('posts.layouts.slide')

      <div class="row">
        @forelse ($items as $item)                     
          @foreach (json_decode($item->image, true) as $image)
              {{-- this loop for showing the first img of items --}}
          @endforeach
            <div class="col-lg-4 col-md-6 col-sm-3 mb-4">
              <div class="card h-100">
                <a href="{{url('posts/'. $item->id)}}"><img class="card-img-top" src="{{asset('storage/images/' . $image)}}"></a>
                <div class="card-body text-center">
                  <h4 class="card-title">
                    <a href="{{url('posts/'. $item->id)}}">{{$item->name}}</a>
                  </h4>
                  <h5>${{$item->price}}</h5>
                </div>
                <div class="card-footer">
                  <form action="{{route('cart.store')}}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" value="{{ $item->id }}" id="id" name="id">
                    <input type="hidden" value="{{ $item->name }}" id="name" name="name">
                    <input type="hidden" value="{{ $item->price }}" id="price" name="price">
                    <input type="hidden" value="{{ $image }}" id="image" name="image">                                    
                    <input type="hidden" value="{{ $item->description }}" id="description" name="description">
                    <input type="hidden" value="1" id="quantity" name="quantity">                                                    
                    <button type="submit" class="btn btn-secondary btn-sm">add to card <i class="fas fa-shopping-cart"></i></button>                                                    
                  </form>
                </div>
              </div>              
            </div>
            @empty
              <div class="col-md-12 col-sm-6 text-center alert alert-danger" role="alert">no item to show</div>
          @endforelse             
      </div>
    </div>
  </div> 
</div>
@endsection