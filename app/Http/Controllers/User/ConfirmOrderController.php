<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class ConfirmOrderController extends Controller
{
    //
    public function __invoke(Order $order)
    {
        $order->update(['status'=>'selesai']);
        return redirect()->back()->with('success', 'berhasil konfirmasi product sampai');
    }
}
