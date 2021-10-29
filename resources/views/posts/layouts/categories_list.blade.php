@section('categories_list')
<div class="list-group">
    <a href="#" class="list-group-item list-group-item-action active">Categories List</a>
    @foreach ($categories as $category)
        <a href="{{ url('/category_items/' . $category->id) }}" class="list-group-item list-group-item-action">{{$category->name}}</a> 
    @endforeach
</div>   
@endsection
