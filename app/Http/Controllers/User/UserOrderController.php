<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\City;
use App\Models\ExpeditionPrice;
use App\Models\Order;
use App\Models\Product;
use App\Models\Province;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class UserOrderController extends Controller
{
    //
    public function index()
    {
        $orders = Order::where('user_id', auth()->user()->id)->get();
        return view('user.order-list', compact('orders'));
    }

    public function create(Request $request)
    {
        $quantity = $request->input('quantity');
        $product_id = $request->input('product_id');
        $cart_id = $request->input('cart_id');
        $product = Product::find($product_id);
        $expedition_prices = ExpeditionPrice::all();

        $provinces = Province::all();
        $cities = City::all();
        return view('user.order-create', compact('product', 'quantity', 'cities', 'provinces', 'cart_id', 'expedition_prices'));
    }

    public function store(Request $request)
    {
        $user = auth()->user();

        $data = [
            'cart_id' => $request->input('cart_id'),
            'product_id' => $request->input('product_id'),
            'quantity' => $request->input('quantity'),
            'address' => $request->input('address'),
            'city_id' => $request->input('city_id'),
            'province_id' => $request->input('province_id'),
            'total' => $request->input('total'),
        ];

        if ($address = $data['address'] && !$user->address) {
            $user->address = $address;
            User::find($user->id)->update([
                'address' => $address,
                'city_id' => $data['city_id'],
                'province_id' => $data['province_id'],
            ]);
        }
        $gate = new Gate();
        if (!$gate::allows('order')) {
            return redirect()->back()->with('error', 'Error Address not set');
        }

        if ($data['cart_id']){
            Cart::find($data['cart_id'])->delete();
        }
        
        $order = Order::create([
            'product_id' => $data['product_id'],
            'quantity' => $data['quantity'],
            'code' => time().$data['product_id'].$user->id,
            'user_id' => $user->id,
            'total' => $data['total'],
        ]);

        $product = Product::find($data['product_id']);
        $product->update([
            'stock' =>$product->stock - $data['quantity'],
        ]);

        return redirect()->route('user.orders.index', $order->id)->with('success', 'success create order');
    }

    public function show(Order $order)
    {
        return view('user.order-list', compact('order'));
    }
}
