<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    //
    public function __invoke(){
        $this->middleware("admin");
        $notifications = [];
        $messages = [];
        $uncorfirmed_orders = [];
        return view('admin.dashboard', compact(['notifications', 'messages', 'uncorfirmed_orders']));
    }
}
