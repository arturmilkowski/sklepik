<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleDocument extends Model
{
    /** @use HasFactory<\Database\Factories\Order\SaleDocumentFactory> */
    use HasFactory;

    protected $fillable = [
        'slug',
        'name',
        'description'
    ];

    /*
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
    */
}
