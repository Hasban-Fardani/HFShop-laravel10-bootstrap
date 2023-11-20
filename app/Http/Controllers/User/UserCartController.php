<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class UserCartController extends Controller
{
    //
    public function index(){
        $carts = Cart::all();
        return view('user.cart-list', compact('carts'));
    }

    public function store(Request $request){
        $data = $request->only(['product_id', 'quantity']);
        $product = Product::find($data['product_id']);
        $product_stock = $product->stock;
        $this->validate($request, [
            'product_id' => 'required',
            'quantity' => 'required|max:$product_stock',
        ]);
        
        Cart::create($data);
        return redirect()->back()->with('success', 'Success add to cart');
    }

    public function show(Cart $cart){
        return view('user.cart-detail', compact('cart'));
    }
}
