<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products  = Product::count();
        $users  = User::count();
        $orders  = Order::count();
        return view('backend.index',compact('products', 'users', 'orders'));
    }
}
