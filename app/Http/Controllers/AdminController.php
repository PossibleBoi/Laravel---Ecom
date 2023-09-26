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

class AdminController extends Controller
{
    // User related operations through Admin

    public function users()
    {
        $users = User::whereHas('roles', function ($query) {
            $query->where('name', 'user');
        })->get();

        return view('admin.users', compact('users'));
    }

    public function add(User $user)
    {
        $roles = Role::all();
        return view('admin.add', compact(['roles', 'user']));
    }

    public function createuser(Request $request)
    {
        $data = $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'role_id' => ['required'],
            'password' => ['required'],
        ]);

        // Create the user
        $new_user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        // Associate the role
        $new_user->roles()->sync($data['role_id']);

        if ($new_user->hasRole('vendor')) {
            $defaultTeamId = 1;
            $defaultTeam = Team::find($defaultTeamId);

            if ($defaultTeam) {
                $new_user->roles()->updateExistingPivot($data['role_id'], ['team_id' => $defaultTeamId]);
            }
        }
        return redirect()->route('admin.users');
    }


    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'email' => ['required'],
            'role_id' => ['required'],
        ]);

        $user->roles()->sync($data['role_id']);

        $user->update($data);
        $user->roles()->updateExistingPivot($data['role_id'], ['team_id' => 1]);


        return redirect()->route('admin.users');
    }

    public function delete(User $user)
    {
        $user->delete();
        return redirect()->back();
    }

    public function products()
    {
        $products = DB::table('images')->groupBy('imageable_id')->join('product', 'product.id', '=', 'images.imageable_id')->get();

        return view('admin.products', compact('products'));
    }

    public function product_edit()
    {
        $id = request('product');
        $products = Product::where('id', $id)->get();
        $images = Images::where('imageable_id', $id)->get();

        return view('admin.edit_products', compact('products', 'images', 'id'));
    }

    public function product_update(Request $req)
    {

        $id = request('product');
        $product = Product::find($id);

        $data = $req->validate([
            'name' => ['required'],
            'description' => ['required'],
            'price' => ['required'],
            'stock' => ['required'],
            'brand' => ['required'],
        ]);

        $product->update($data);

        if ($req->hasFile('file')) {
            foreach ($req['file'] as $image) {
                $img = time() . rand(1, 100000) . '.' . $image->extension();
                $image->move(public_path('storage'), $img);
                Images::create([
                    'imageable_id' => $product->id,
                    'imageable_type' => 'product',
                    'image' => ("storage\\$img"),
                ]);
            }
        }

        return redirect()->route('admin.products');
    }

    public function product_delete()
    {
        $id = request('product');
        $product = Product::find($id);
        $image_org = Images::where('imageable_id', $id)->get();

        // dd($image_org);

        foreach ($image_org as $img) {
            $path = $img->image;
            if (File::exists($path)) {
                File::delete($path);
                $product->delete();
                $img->delete();
            } else {
                $product->delete();
                $img->delete();
            }
        }
        return redirect()->route('admin.products');
    }
}
