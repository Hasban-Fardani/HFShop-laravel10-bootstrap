<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeProductController extends Controller
{
    //
    public function index(){
        $products = Product::paginate(15);
        $categories = Category::all();
        return view('products', compact(['products', 'categories']));
    }
}
