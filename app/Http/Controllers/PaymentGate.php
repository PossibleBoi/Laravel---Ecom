<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Checkout;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Dipesh79\LaravelKhalti\LaravelKhalti;

class PaymentGate extends Controller
{
  public function khalti(Request $req)
  {
    //Store payment details in DB with pending status
    $khalti = new LaravelKhalti();
    $amount = 123; // In Paisa
    $order_id = 251264889; //Your Unique Order Id
    $order_name = "Order Name";

    $payment_response = $khalti->khaltiCheckout($amount, $order_id, $order_name);

    $pidx = $payment_response['pidx']; //Store this to your db for future reference.
    $url = $payment_response['payment_url'];
    return redirect($url);
  }

  public function pay(Request $req)
  {
    for($i=0; $i != count($req->product_id); $i++ )
    {
      $checkout = new Checkout();
      $checkout->user_id = Auth::user()->id;
      $checkout->product_id = $req->product_id[$i];
      $checkout->quantity = $req->quantity[$i];
      $checkout->price = $req->price[$i] * $req->quantity[$i];
      $checkout->payment_method = $req->pay;
      $checkout->payment_status = 'Pending';  
      $checkout->delivery_status = 'Pending'; //pending, delivered, cancelled
      $checkout->save();
    }

    Cart::where('user_id', Auth::user()->id)->delete();

    return redirect()->route('home');

  }

  public function order_cancel()
  {
    Checkout::where('id', Request('cancel_btn'))->update(['delivery_status' => 'Cancelled',
    'payment_status' => 'Cancelled']);

    return redirect()->back();
    }

  public function order_deliver()
  {
    Checkout::where('id', Request('initiate_btn'))->update(['delivery_status' => 'Delivered', 'payment_status' => 'Paid']);

    return redirect()->back();
  }
} 
