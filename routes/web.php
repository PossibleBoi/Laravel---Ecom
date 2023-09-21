<?php

use App\Models\Images;
use App\Models\Product;
use App\Livewire\Counter;
use App\Models\ProdVendor;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::middleware('auth')->group(function(){
    
    Route::get('/',[HomeController::class,'home'])->name('home');
    Route::get('/all_products',[HomeController::class,'all_products'])->name('all_products');
    Route::get('/cart',[HomeController::class,'cart'])->name('cart');
});



Route::get('/dashboard', function () {
    return view('dashboard  ');
})->middleware(['auth', 'verified', 'role:user'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');     
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth','role:admin'])->group(function () {
    Route::get('admin/dashboard', [DashController::class, 'admin'])->name('admin.dashboard');
    Route::get('admin/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('admin/edit/{user}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::get('admin/add', [AdminController::class, 'add'])->name('admin.add');
    Route::put('admin/update/{user}', [AdminController::class, 'update'])->name('admin.update');  
    Route::delete('admin/delete/{user}', [AdminController::class, 'delete'])->name('admin.delete');
    Route::post('admin/create', [AdminController::class, 'createuser'])->name('admin.create');

    Route::get('admin/vendors',[VendorController::class,'vendors'])->name('admin.vendors');
    Route::get('admin/vendor_edit/{user}',[VendorController::class,'vendor_edit'])->name('vendor.edit'); //Edit Registered Vendor Information
    Route::put('admin/vendor_update/{user}', [VendorController::class, 'vendor_update'])->name('vendor.update');  //Update Registered Vendor Information
    
    Route::get('admin/team_add',[VendorController::class,'vendor_add'])->name('team.add'); //Add vendor teams
    Route::post('admin/team_create',[VendorController::class,'create_team'])->name('team.create'); //Create vendor teams
    Route::get('admin/team_edit/{team}',[VendorController::class,'team_edit'])->name('team.edit'); //Edit Registered Vendor Information
    Route::put('admin/team_update/{team}', [VendorController::class, 'team_update'])->name('team.update');  //Update Registered Vendor Information
    Route::delete('admin/team_delete/{team}', [VendorController::class, 'team_delete'])->name('team.delete');

    Route::get('admin/products',[AdminController::class,'products'])->name('admin.products'); //View all registered products
    Route::get('admin/products/edit/{product}',[AdminController::class,'product_edit'])->name('a_product.edit'); //Edit Registered Vendor Information
    Route::put('admin/products/update/{product}',[AdminController::class,'product_update'])->name('a_product.update'); //Edit Registered Vendor Information
    Route::delete('admin/products/delete/{product}',[AdminController::class,'product_delete'])->name('a_product.delete'); //Delete Registered Vendor Information
});
    


Route::middleware(['auth','role:vendor'])->group(function () {
    Route::get('vendor/dashboard', [DashController::class, 'vendor'])->name('vendor.dashboard');
    Route::get('vendor/product_add',[ProductController::class,'add'])->name('product.add'); //Add Vendor Products
    Route::post('vendor/product_create',[ProductController::class,'create'])->name('product.create'); //Create Vendor products
    Route::post('vendor/product_create_img',[ProductController::class,'create_img'])->name('product.create_img'); //Add vendor teams
    Route::get('vendor/products',[ProductController::class,'products'])->name('vendor.products'); //View all registered products
    Route::get('vendor/products/edit/{product}',[ProductController::class,'edit'])->name('product.edit'); //Edit Registered Vendor Information
    Route::put('vendor/products/update/{product}',[ProductController::class,'update'])->name('product.update'); //Edit Registered Vendor Information
    Route::delete('vendor/products/delete/{product}',[ProductController::class,'delete'])->name('product.delete'); //Delete Registered Vendor Information
});

require __DIR__.'/auth.php';

 
Route::get('/counter', Counter::class);
