<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Concentration extends Model
{
    /** @use HasFactory<\Database\Factories\Product\ConcentrationFactory> */
    use HasFactory;

    protected $fillable = [
        'slug',
        'name'
    ];
    
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
