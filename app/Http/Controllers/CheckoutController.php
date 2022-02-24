<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Gloudemans\Shoppingcart\Facades\Cart;
use Stripe\Stripe; 
use Stripe\Charge;


class CheckoutController extends Controller
{
    //
    public function index () {

        if(Cart::content()->count() < 1)
        {
          session()->flash('info', 'Cart is empty, please add product. ');
          return redirect()->back();  
        }
        
        return view('checkout');

        
    }

    public function pay () {


        Stripe::setApiKey('sk_test_51JeGWyB0sQktqwYpxx9KCWOxsWuDHHgw1nCDKu6ohmGLZeanz7STLyGAfG25RjzAilGNJU8BWQFW7SHUiP12Aqtr00zYdyruLQ');

         

        $charge = Charge::create([
            'amount' => Cart::total() * 100,
            'currency' => 'eur',
            'description' => 'patikee aa',
            'source' => request()->stripeToken,
          ]);

          session()->flash('success', '"Purchase successfull. ');

      //  Mail::to(request()->stripeEmail)->send(new \App\Mail\PurchaseSuccesfull);
          Cart::destroy();
          return redirect()->back();
    }
}

