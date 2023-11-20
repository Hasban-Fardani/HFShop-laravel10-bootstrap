<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    //
    public function index(Request $request)
    {
        $user = auth()->user();
        $success = $request->input('success');

        if ($success) {
            $orders_all = Order::where('status', 'selesai')->get();
        } else {
            $orders_all = Order::all();
        }

        $orders = [];
        foreach ($orders_all as $order) {
            if ($order->product->seller_id == $user->id) {
                array_push($orders, $order);
            }
        }
        return view('admin.order-list', compact('orders'));
    }

    public function show(Order $order)
    {
        return view('admin.order-detail', compact('order'));
    }

    public function edit(Order $order)
    {
        return view('admin.order-edit', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        $status = $request->input('status');
        if (!$status){
            return back()->with('error', 'Tidak ada status yang dipilih');
        }

        $order->update(['status' => $status]);
        return redirect()->route('admin.orders.index');
    }
}
