<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;

class ShopController extends Controller
{
    //

    public function index ()
    {

        return view('welcome');
    }

    public function add_to_cart()
    {
        $product = Product::find(request()->product_id);

        $cartItem = Cart::add(
            [
                'id' => $product->id,
                'name' => $product->name,
                'qty' => request()->qty,
                'price' => $product->price
            ]
        );

        Cart::associate($cartItem->rowId, 'App\Models\Product');

        session()->flash('success', 'Prdouct added to cart. ');
        
        return redirect()->route('cart'); 
    }

    public function cart()
    {
        
        return view('cart');
    }

    public function cart_delete($id){
        Cart::remove($id);

        session()->flash('success', 'Product removed from cart. ');
        return redirect()->back();  
    }

    public function cart_qty_decreasing ($id, $qty){

        Cart::update($id, ['qty' => $qty - 1] );

        return redirect()->back();
    }
    
    public function cart_qty_increasing ($id, $qty){

        Cart::update($id, ['qty' => $qty + 1] );

        return redirect()->back();
    }


}
