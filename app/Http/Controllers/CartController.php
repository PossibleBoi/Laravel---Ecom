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
        if (!empty(Auth::user()->id)) {
            $active_user_id = Auth::user()->id;
            $user = DB::table('users')->where('users.id', $active_user_id)
                ->join('role_user', 'role_user.user_id', '=', 'users.id')
                ->join('roles', 'role_user.role_id', '=', 'roles.id')
                ->select('users.id', 'users.name', 'users.email', 'role_user.role_id as role_id', 'roles.display_name as role_name')
                ->get();
        } else {
            $user = null;
        }

        $products = DB::table('images')->groupBy('imageable_id')
            ->join('product', 'product.id', '=', 'images.imageable_id')
            ->join('cart', 'cart.product_id', '=', 'images.imageable_id')
            ->where('user_id', Auth::user()->id)
            ->get();

        $total = 0;

        foreach ($products as $item) {
            // Assuming you have a relationship between cart items and products

            // Calculate the total for the current product and add it to the overall total
            $productTotal = $item->price * $item->quantity;
            $total += $productTotal;
        }

        return view('cart', compact('user', 'products', 'total'));
    }

    public function add_cart()
    {

        $prod = Product::where('id', Request('id'))->get();
        $user = Auth::user();
        $quantity = Request('quantity');


        if ((Cart::where('user_id', $user->id)->where('product_id', $prod->first()->id)->first())) {
            $cart = Cart::where('user_id', $user->id)->where('product_id', $prod->first()->id)->first();
            $cart->quantity = $cart->quantity + $quantity;
            $cart->save();
        } else {
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

    public function remove()
    {
        $id = request('id');

        $item = Cart::where('id', $id)->first();

        $item->delete();

        return redirect()->back();
    }

    public function quantity_update(Request $request)
    {
        $quantity = Request('quantity');
        // Assuming you have a relationship between cart items and products
        $cartItem = Cart::where('id', Request('id'))->where('user_id', Auth::id())->first();

        if ($cartItem) {
            // Update the quantity for the cart item
            $cartItem->quantity = $quantity;
            $cartItem->save();
        }

        return redirect()->back();
    }


    public function checkout()
    {
        if (!empty(Auth::user()->id)) {
            $active_user_id = Auth::user()->id;
            $user = DB::table('users')->where('users.id', $active_user_id)
                ->join('role_user', 'role_user.user_id', '=', 'users.id')
                ->join('roles', 'role_user.role_id', '=', 'roles.id')
                ->select('users.id', 'users.name', 'users.email', 'role_user.role_id as role_id', 'roles.display_name as role_name')
                ->get();

            $cart = count(Cart::where('user_id',Auth::user()->id)->get());
            
            } else {
                $user = null;
                $cart =  0;
            }
            
            $products = DB::table('images')->groupBy('imageable_id')
            ->join('product', 'product.id', '=', 'images.imageable_id')
            ->join('cart', 'cart.product_id', '=', 'images.imageable_id')
            ->where('user_id', Auth::user()->id)
            ->get();
            
            $total = 0;

            foreach ($products as $item) {
                // Assuming you have a relationship between cart items and products
    
                // Calculate the total for the current product and add it to the overall total
                $productTotal = $item->price * $item->quantity;
                $total += $productTotal;
            }

            $product_vendor = ProdVendor::all();
            
            return view('checkout', compact('user','cart','products', 'product_vendor','total'));
        
    }
}
