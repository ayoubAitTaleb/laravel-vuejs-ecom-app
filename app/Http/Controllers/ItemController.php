<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreItem;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }
    public function index()
    {
        $items = Item::all();
        $categories = Category::withCount('items')->get();
        $itemCommented = Item::withCount('comments')->orderBy('comments_count', 'desc')->get();
        return view('posts.user.index', compact('items', 'categories', 'itemCommented'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('posts.user.create')->with('category', $category);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreItem $request)
    {
        $items = new Item;
        $items->name = $request->input('name');
        $items->description = $request->input('description');
        $items->price = $request->input('price');
        $items->category_id = $request->input('category_id');
        foreach ($request->file('image') as $file) {
            $image = $file->getClientOriginalName();            
            $file->move('storage/images',$image);          
            $images[] = $image;                
        }        
        $items->image = json_encode($images);
        $items->save();
        $request->session()->flash('item', 'item add successfull');
        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Item::find($id);
        $comments = Comment::where('item_id','=', $id)->get();
        $randomItem = Item::inRandomOrder()->where('category_id',$item->category_id)->where('id', '!=', $id)->limit(3)->get();
        return view('posts.user.show', compact('item', 'comments', 'randomItem'));
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Item::findOrFail($id);
        $category = Category::all();
        return view('posts.user.edit', compact('item', 'category')) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'name'        => 'bail|required|min:4|max:12',
                'description' => 'required|min:6|max:254',
                'price'       => 'required'
            ]);
        $items = Item::find($id);
        $items->name = $request->input('name');
        $items->description = $request->input('description');
        $items->price = $request->input('price');
        $items->category_id = $request->input('category_id');
        $items->save();
        return redirect()->route('posts.index');
    }

    // public function updateImage(Request $request, $id) 
    // {
    //     $item = Item::find($id);
    //     $items->image = $request->file('image')->store('images', 'public');
    //     $item->save();
    //     return redirect('/posts');
    // }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);
        $item->delete();
        return redirect('/posts');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $result = Item::query()->where('name', 'like', '%'.$search.'%')->orWhere('description', 'like', '%'.$search.'%')->get();
        $category = Category::all();        
        return view('posts.user.search_result', compact('result', 'category'));
    }

}
