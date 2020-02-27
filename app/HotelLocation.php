<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelLocation extends Model
{
    protected $fillable = [
        'hotel_id',
        'city',
        'state',
        'country',
        'zip_code',
        'address',
    ];
}
