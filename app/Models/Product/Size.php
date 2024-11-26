<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Size extends Model
{
    /** @use HasFactory<\Database\Factories\Product\SizeFactory> */
    use HasFactory;
    
    protected $fillable = [
        'slug',
        'name',
        'description',
    ];

    public function types(): HasMany
    {
        return $this->hasMany(Type::class);
    }
}
