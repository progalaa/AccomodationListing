<?php


namespace App\Services;


use App\Repositories\HotelRepository;

class HotelService
{
    protected $hotelRepository;

    public function __construct(HotelRepository $hotelRepository)
    {
        $this->hotelRepository = $hotelRepository;
    }
}
