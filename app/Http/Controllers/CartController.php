<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    
    public function cart() 
    {
        $cartCollection = \Cart::getContent();
        //dd($cartCollection);
        return view('posts.user.cart')->with('cartCollection', $cartCollection);
    }
    
    public function addToCart(Request $request){
        $cartCollection = \Cart::getContent();
        \Cart::add(array(
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image,
                'description' => $request->description
            )
        ));
        return redirect('/cart')->with('success_msg', 'Item is Added to Cart!');
    }

    public function updateCart(Request $request, $id) {
        \Cart::update($id, array(
            'quantity' => array(
                'relative' => false,
                'value' => $request->quantity
            ),
          ));
          return redirect()->back();
    }

    public function removeFromCart($id) {
        \Cart::remove($id);
        return redirect()->back();
    }
    
    public function clearCart() {
        \Cart::clear();
        return redirect('/cart');
    }
}
