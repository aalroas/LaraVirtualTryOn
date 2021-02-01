<?php

namespace App\Http\Controllers\frontend;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserAccountController extends Controller
{


    public function account()
    {
        $orders = auth()->user()->orders;
        return view('frontend.orders.index', compact('orders'));
    }


    public function orders()
    {
        $orders = auth()->user()->orders;
        return view('frontend.orders.index', compact('orders'));
    }
    public function cart($id)
    {
        $product = Product::find($id);
        return view('frontend.orders.cart',compact('product'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([$request->all()]);
        $order = new Order;
        $order->user_id = Auth()->user()->id;
        $order->product_id = $request->product_id;
        $order->status = "New";
        $order->qty =  $request->qty;
        $order->total =  $request->qty * $request->price;
        $order->save();
        return view('frontend.orders.thanks',compact('order'));

    }
    public function thanks()
    {

    }





}
