<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Factories\Relations\MorphToMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany as RelationsMorphToMany;

Relation::enforceMorphMap([
    'product' => 'App\Models\Product',
    'user' => 'App\Models\User',
]);

class Images extends Model
{
    protected $table = 'images';

    protected $fillable = [
        'imageable_id',
        'imageable_type',
        'image'
    ];
    public function imageable(): MorphTo
    {
        return $this->morphTo();
    }
}
