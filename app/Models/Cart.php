<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'cart';

    protected $hidden = [
        'session_id',
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'user_id',
        'product_id',
        'session_id',
        'quantity',
        'price',
        'total',
    ];
}
