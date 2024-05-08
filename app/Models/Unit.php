<?php

namespace App\Models;

use App\Enums\DefaultStatus;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Unit extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = [];

    protected $casts = [
        'status' => 'string',
    ];

    public function service(): BelongsTo
    {
        return $this->belongsTo(ServiceOffer::class);
    }

    public function vendor(): BelongsTo
    {
        return $this->belongsTo(Vendor::class);
    }

    public function status(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => DefaultStatus::from($value),
        );
    }

    public function setStatusAttribute($value)
    {
        $this->attributes['status'] = ($value instanceof DefaultStatus) ? $value->value : DefaultStatus::from($value)->value;
    }

    public function getStatusAttribute($value)
    {
        return DefaultStatus::from($value);
    }
}
