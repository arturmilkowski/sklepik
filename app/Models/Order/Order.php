<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany, MorphTo};
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\Order\OrderFactory> */
    use HasFactory;
    use HasUlids;

    protected $fillable = [
        'orderable_id',
        'orderable_type',
        'status_id',
        'sale_document_id',
        'total_price',
        'delivery_cost',
        'total_price_and_delivery_cost',
        'delivery_name',
        'comment'
    ];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'status_id' => 1,
        'sale_document_id' => 1,
    ];

    public function orderable(): MorphTo
    {
        return $this->morphTo();
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }

    public function saleDocument(): BelongsTo
    {
        return $this->belongsTo(SaleDocument::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }
}
