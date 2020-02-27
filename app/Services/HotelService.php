<?php


namespace App\Services;

use App\Exceptions\UnExpectedException;
use App\Repositories\HotelRepository;

class HotelService
{
    protected $hotelRepository;

    public function __construct(HotelRepository $hotelRepository)
    {
        $this->hotelRepository = $hotelRepository;
    }

    public function getHotels()
    {
        try {
            return $this->hotelRepository->all();
        } catch (\Throwable $th) {
            throw new UnExpectedException();
        }
    }
}
