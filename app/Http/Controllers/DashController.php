<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Images;
use App\Models\Product;
use App\Models\ProdVendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashController extends Controller
{
    public function admin()
    {
        return view('admin.dashboard');
    }

    public function vendor()
    {
        return view('vendor.dashboard');
    }

    public function user()
    {
        $user = Auth::user();

        $orders = DB::table('orders')
            ->join('product', 'product.id', '=', 'orders.product_id')
            ->join('product_vendor', 'product_vendor.product_id', '=', 'orders.product_id')
            ->join('users', 'users.id', '=', 'orders.user_id')
            ->where('user_id', $user->id)
            ->select('orders.*', 'product.name as product_name', 'users.name')
            ->get();


        $images = Images::where('imageable_type', '=', 'product')
            ->groupBy('imageable_id')->select('imageable_id', 'image')->get();


        return view('dashboard', compact('user', 'orders','images'));
    }

    public function home(User $user)
    {

        $products = Product::all();
        $images = Images::all();
        $product_vendor = ProdVendor::all();

        return view('index', compact('user', 'products', 'images', 'product_vendor'));
    }
}
