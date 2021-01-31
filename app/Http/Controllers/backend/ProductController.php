<?php

namespace App\Http\Controllers\backend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     private $uploadPath = "uploads/products/";

    public function index()
    {
        $products = Product::all();
        return view('backend.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.products.create');
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
        $product = Product::create($request->except('image'));
        if ($request->hasFile('image')) {
                $image_name = date('mdYHis') . uniqid() .'.'. $request->file('image')->getClientOriginalExtension();
                $path = $this->getUploadPath();
                $request->file('image')->move($path, $image_name);
                $product->image = $path . $image_name;
                $product->save();
         return redirect(route('backend.products.index'));
        }
    return redirect(route('backend.products.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('backend.products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([$request->all()]);
        $product->update($request->except('image'));
        if ($request->hasFile('image')) {
            $image_name = date('mdYHis') . uniqid() .'.'. $request->file('image')->getClientOriginalExtension();
            $path = $this->getUploadPath();
            $request->file('image')->move($path, $image_name);
            $product->image = $path . $image_name;
            $product->save();
           return redirect(route('backend.products.index'));
        }
            return redirect(route('backend.products.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        // return dd($product);
        $product->delete();
       return redirect(route('backend.products.index'));
    }

      // update tab of site status

    public function getUploadPath()
    {
        return $this->uploadPath;
    }


    // update tab of Style Settings

    public function setUploadPath($uploadPath)
    {
        $this->uploadPath = Config::get('app.APP_URL') . $uploadPath;
    }
}
