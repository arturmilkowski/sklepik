<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    /** @use HasFactory<\Database\Factories\Product\BrandFactory> */
    use HasFactory;

    protected $fillable = [
        'slug',
        'name'
    ];
}
