<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Geo\Voivodeship;

class DeliveryAddress extends Model
{
    /** @use HasFactory<\Database\Factories\User\DeliveryAddressFactory> */
    use HasFactory;

    protected $fillable = [
        'profile_id',
        'voivodeship_id',
        'street',
        'zip_code',
        'city'
    ];

    public function profile(): BelongsTo
    {
        return $this->belongsTo(Profile::class);
    }

    public function voivodeship(): BelongsTo
    {
        return $this->belongsTo(Voivodeship::class);
    }
}
