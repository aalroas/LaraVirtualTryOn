<?php

namespace App\Http\Controllers\backend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class ProductController extends Controller
{
 

    public function index()
    {
        $products = Product::all();
        return view('frontend.products.index', compact('products'));
    }

   

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {

      return view('frontend.products.show',compact('product'))
    }
}
