<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProdVendor extends Model
{
    use HasFactory;
    protected $table = 'product_vendor';
    protected $fillable = [
        'product_id',
        'team_id',
    ];
}
