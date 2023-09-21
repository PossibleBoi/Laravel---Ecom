<?php

namespace App\Http\Controllers;


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

class HomeController extends Controller
{

    public function home()
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

        $products = DB::table('product')
            ->join('product_vendor', 'product_vendor.product_id', '=', 'product.id')
            ->join('images', 'images.imageable_id', '=', 'product.id')
            ->inRandomOrder()->paginate(8);

        $product_vendor = ProdVendor::all();

        return view('index', compact('user', 'products', 'product_vendor'));
    }

    public function all_products()
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

        $products = DB::table('product')
            ->join('product_vendor', 'product_vendor.product_id', '=', 'product.id')
            ->join('images', 'images.imageable_id', '=', 'product.id')
            ->get();

        $product_vendor = ProdVendor::all();
        return view('all_products', compact('user', 'products', 'product_vendor'));
    }

    public function cart()
    {
        $products = DB::table('images')->groupBy('imageable_id')->join('product', 'product.id', '=', 'images.imageable_id')->get();
        return view('cart', compact('products'));
    }
}
