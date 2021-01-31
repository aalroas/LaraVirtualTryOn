<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Controllers\Controller;
class HomeController extends Controller
{
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products  = Product::all();
        return view('frontend.index',compact('products'));
    }
}
