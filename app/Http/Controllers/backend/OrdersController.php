<?php

namespace App\Http\Controllers\backend;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{


    public function index()
    {
        $orders = Order::all();
        return view('backend.orders.index', compact('orders'));
    }


    public function edit($id)
    {
        $order =Order::find($id);
        return view('backend.orders.edit',compact('order'));

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


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)

    {
        $request->validate([$request->all()]);
        $order = Order::find($id);
        $order->user_id =  $order->user->id;
        $order->product_id = $order->product->id;

        $order->status =  $request->status;
        $order->qty =  $order->qty;
        $order->total =  $order->qty * $order->product->price;

        $order->save();

     return redirect(route('backend.orders.index'));
    }


    public function thanks()
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        // return dd($order);
       $order->delete();
       return redirect(route('backend.orders.index'));
    }






}
