<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Images;
use App\Models\Product;
use App\Models\ProdVendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Client\ResponseSequence;
use Illuminate\Support\Facades\Route;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class ProductController extends Controller
{
    public function add(User $user)
    {
        return view('vendor.add_product', compact('user'));
    }

    public function create(Request $req)
    {
        $vendor_team = Auth::user()->roles->first()->pivot->team_id;

        $data = $req->validate([
            'name' => ['required'],
            'description' => ['required'],
            'price' => ['required'],
            'stock' => ['required'],
            'brand' => ['required'],
        ]);

        $product = Product::create($data);

        ProdVendor::create([
            'product_id' => $product->id,
            'team_id' => $vendor_team,
        ]);
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
    }


    public function products()
    {
        $vendor_team = Auth::user()->roles->first()->pivot->team_id;
        
        $products = DB::table('images')->groupBy('imageable_id')
        ->join('product', 'product.id', '=', 'images.imageable_id')
        ->join('product_vendor','product_id','=','product.id')
        ->where('team_id','=',$vendor_team)->get();
  
        return view('vendor.products', compact('products'));
    }

    public function edit()
    {
        $id = request('product');
        $products = Product::where('id', $id)->get();
        $images = Images::where('imageable_id', $id)->get();

        return view('vendor.edit_products', compact('products', 'images', 'id'));
    }

    public function update(Request $req)
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

        return redirect()->route('vendor.products');
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
        return redirect()->route('vendor.products');
    }

    public function delete()
    {
        $id = request('product');
        $product = Product::find($id);
        $image_org = Images::where('imageable_id', $id)->first();
        $path = $image_org->image;

        if (File::exists($path)) {
            File::delete($path);
            $product->delete();
            $image_org->delete();
        } else {
            $product->delete();
            $image_org->delete();
        }

        return redirect()->route('vendor.products');
    }

    public function edit_img_del(Request $req)
    {
        foreach(request('selected_images') as $img_id){
        $image_org = Images::where('id', $img_id)->first();
        $path = $image_org->image;
        if (File::exists(public_path($path))) {
            File::delete(public_path($path));
            $image_org->delete();
        } else {
            $image_org->delete();
        }
    }
        return redirect()->back();
    }
}
