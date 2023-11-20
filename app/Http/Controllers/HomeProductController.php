<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeProductController extends Controller
{
    //
    public function index(Request $request)
    {
        $categories = Category::all();
        $products = Product::paginate(15);

        if (!$request->category || $request->category == 'all') {
            return view('products', ['products' => $products, 'categories' => $categories]);
        }

        $products_filtered = [];
        $category = explode(',', $request->category);
        foreach ($products as $product) {
            if (in_array($product->category->name, $category)) {
                array_push($products_filtered, $product);
            }
        }
        return view('products', ['products' => $products_filtered, 'categories' => $categories]);
    }

    public function show(Product $product)
    {
        return view('products-details', compact('product'));
    }
}
