<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{
    /** @use HasFactory<\Database\Factories\Order\ItemFactory> */
    use HasFactory;

    protected $fillable = [
        'order_id',
        'type_id',
        'type_size_id',
        'type_name',
        'name',
        'concentration',
        'category',
        'price',
        'quantity',
        'subtotal_price'
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
