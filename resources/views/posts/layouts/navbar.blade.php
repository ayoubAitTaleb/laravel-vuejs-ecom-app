@section('navbar')
@include('posts.layouts.breadcrumb')
<div>
  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: lightgrey;">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{url('/posts')}}">
          <span>Shop</span><span>Cart</span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse" id="main-nav">
        <ul class="navbar-nav ml-auto">
          @if(Auth::user()->id == 1)
          <li class="nav-item">
            <a class="nav-link" href="{{'/posts/create'}}">Add Item</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/category/create')}}">Add Category</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('category.index')}}">list Categories</a>
          </li>
          @endif
            <li class="nav-item">
              <a class="nav-link" href="{{'about'}}">About</a>
          </li>
          <li class="nav-item">
            @include('posts.layouts.get-total-quantity')                 
          </li>
          <li class="nav-item">
            @include('posts.layouts.login-logout-drop')         
          </li>
        </ul>
      </div>
    </div>
  </nav>
</div>

@endsection
