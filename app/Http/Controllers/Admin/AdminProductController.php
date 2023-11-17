<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    // public function __construct() {
    //     $this->notifications = [];
    //     $this->messages = [];
    //     $this->unconfirmed_orders = [];
    // }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        // $p_a = Product::where("user_id", auth()->user()->id)->get();
        return view("admin.product-list", compact(["products"]));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view("admin.product-add", compact(["categories"]));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $file = $request->file('image');
        if (!$file) {
            return redirect()->back()->with('error', 'Please upload an image');
        }

        // get all data except token and image
        $data = [...$request->except(['_token', 'image'])];

        // store image to /public/images/products
        $filename = time() . '-' . $file->getClientOriginalName();

        // get base path from config
        $base_path = config('app.product_image_path');

        // get public path from $base_path
        $destinationPath = public_path($base_path);

        // move file to destination path
        $file->move($destinationPath, $filename);

        // add image name to data array
        $data['image'] = $base_path . $filename;

        // add seller_id
        $data['seller_id'] = auth()->user()->id;

        // create product
        Product::create($data);

        // dd($data, $file, $product);

        // redirect back to product list with success message
        return redirect()->back()->with('success', 'Product added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
        $categories = Category::all();
        return view('admin.product-edit', compact(['product', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
        $data = [...$request->except(['_token', '_method', 'image'])];

        $file = $request->file('image');
        if ($file) {
            $filename = time() . '-' . $file->getClientOriginalName();
            $base_path = config('app.product_image_path');
            $destinationPath = public_path($base_path);
            $file->move($destinationPath, $filename);
            $data['image'] = $base_path . $filename;
        }

        $product->update($data);
        return redirect()->back()->with('success','Success edit product');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
        $product->delete();
        return redirect()->back()->with('success','success deleted product');
    }
}
