<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class FrontentController extends Controller
{
    //

    public function index(){

        return view('index')->with('products', Product::paginate(3));
    }

    public function show (Product $product)
    {
        return view('proudctShow')->with('product', $product);
    }
}
