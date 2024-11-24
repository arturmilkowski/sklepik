<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Concentration extends Model
{
    /** @use HasFactory<\Database\Factories\Product\ConcentrationFactory> */
    use HasFactory;

    protected $fillable = [
        'slug',
        'name'
    ];    
}
