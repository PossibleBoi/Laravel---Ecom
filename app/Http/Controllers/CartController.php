<?php


namespace App\Http\Controllers;


use App\Models\Cart;
use App\Models\Role;
use App\Models\Team;

use App\Models\User;
use App\Models\Images;
use App\Models\Product;
use Illuminate\View\View;
use App\Models\ProdVendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;


class CartController extends Controller
{
    public function cart()
    {
        $user = Auth::user();

        $products = DB::table('images')->groupBy('imageable_id')
        ->join('product', 'product.id', '=', 'images.imageable_id')
        ->join('cart','cart.product_id','=','images.imageable_id')
        ->where('user_id',Auth::user()->id)
        ->get();
        $total = 0;

        foreach ($products as $item) {
            // Assuming you have a relationship between cart items and products
        
            // Calculate the total for the current product and add it to the overall total
            $productTotal = $item->price * $item->quantity;
            $total += $productTotal;
        }


        return view('cart', compact('user','products','total'));
    }

    public function add_cart()
    {
        
        $prod = Product::where('id',Request('id'))->get();
        $user = Auth::user();
        $quantity = Request('quantity');
        
     
        if((Cart::where('user_id',$user->id)->where('product_id',$prod->first()->id)->first())){
            $cart = Cart::where('user_id',$user->id)->where('product_id',$prod->first()->id)->first();
            $cart->quantity = $cart->quantity + $quantity;
            $cart->save();
        }
        else{
             Cart::create(
                [
                    'user_id' => $user->id,
                    'product_id' => $prod->first()->id,
                    'quantity' => $quantity,
                ]
                );
        }

        return redirect()->back();
    }
}
