<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Images;
use App\Models\Product;
use App\Models\ProdVendor;
use Illuminate\Http\Request;
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

    public function home(User $user)
    {   
        $products = Product::all();
        $images = Images::all();
        $product_vendor = ProdVendor::all();
        return view('index', compact('user', 'products', 'images', 'product_vendor'));
    }


}
