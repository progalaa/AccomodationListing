<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $fillable = [
        'name',
        'rating',
        'category',
        'image',
        'reputation',
        'reputationBadge',
        'price',
        'availability',
    ];

    public function location()
    {
        return $this->hasOne(HotelLocation::class);

    }
}
