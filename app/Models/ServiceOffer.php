<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ServiceOffer extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = [];

    public function unit(): HasMany
    {
        return $this->hasMany(Unit::class);
    }
}
