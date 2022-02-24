<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Str;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use App\Http\Requests\ProductUpdateRequest;

class ProductController extends Controller
{
    //
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('product.index')->with('products', Product::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        
       $img = $request->img->store('product');
       $user_id = auth()->user()->id; 
      
       Product::create([
            "user_id" => $user_id,
            "name" => $request->name,
            "slug" => Str::slug($request->name),
            "description" => $request->description,
            "price" => $request->price,
            "img" => $img,

       ]); 

       session()->flash('success', 'Product added!');

       return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('product.create')->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {

        $product->update([
            "user_id" => auth()->user()->id,
            "name" => $request->name,
            "slug" => Str::slug($request->name),
            "description" => $request->description,
            "price" => $request->price,
        ]);

        if ($request->hasFile('photo')){

            $img = $request->img->store('product');
  
            $product->update([
                'img' => $img
            ]);
        }

        session()->flash('success', 'Product updated!');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        session()->flash('success', 'Product deleted successfully');

        return redirect()->back();
    }
}
