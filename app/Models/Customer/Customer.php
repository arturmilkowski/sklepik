<?php

namespace App\Models\Customer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, MorphOne};
use App\Models\Geo\Voivodeship;
use App\Models\Order\Order;

class Customer extends Model
{
    /** @use HasFactory<\Database\Factories\Customer\CustomerFactory> */
    use HasFactory;

    protected $fillable = [
        // 'voivodeship_id',
        'name',
        'surname',
        'street',
        'zip_code',
        'city',
        'email',
        'phone',
    ];

    /*
    public function voivodeship(): BelongsTo
    {
        return $this->belongsTo(Voivodeship::class);
    }
    */
    /*
    public function order(): MorphOne
    {
        return $this->morphOne(Order::class, 'orderable');
    }
    */
}
