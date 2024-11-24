<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Type extends Model
{
    /** @use HasFactory<\Database\Factories\Product\TypeFactory> */
    use HasFactory;

    protected $fillable = [
        'product_id',
        'size_id',
        'slug',
        'name',
        'price',
        'promo_price',
        'quantity',
        'description',
        'img',
        'hide',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function size(): BelongsTo
    {
        return $this->belongsTo(Size::class);
    }
}
