<?php


namespace App\Services;

use App\Exceptions\UnExpectedException;
use App\Repositories\HotelRepository;
use Illuminate\Support\Facades\DB;

class HotelService
{
    protected $hotelRepository;

    public function __construct(HotelRepository $hotelRepository)
    {
        $this->hotelRepository = $hotelRepository;
    }

    public function create(array $hotel)
    {
         try {

             if ($hotel['reputation'] <= 500)
                 $reputationBadge = 'red';
             elseif ($hotel['reputation'] <=799)
                 $reputationBadge = 'yellow';
             else
                 $reputationBadge = 'green';

             $createdHotel = DB::transaction(function () use ($hotel, $reputationBadge) {
                $hotelData = [
                    'name'  => $hotel['name'],
                    'rating'  => $hotel['rating'],
                    'category'  => $hotel['category'],
                    'image'  => $hotel['image'],
                    'reputation'  => $hotel['reputation'],
                    'reputationBadge'  => $reputationBadge,
                    'price'  => $hotel['price'],
                    'availability'  => $hotel['availability'],
                ];
                 $createdHotel = $this->hotelRepository->create($hotelData);
                 if (isset($hotel['location'])) {
                     $locationData = [
                         'city' => $hotel['location']['city'],
                         'state' => $hotel['location']['state'],
                         'country' => $hotel['location']['country'],
                         'zip_code' => $hotel['location']['zipCode'],
                         'address' => $hotel['location']['address'],
                     ];
                     $createdHotel->location()->create($locationData);
                 }

                 return $createdHotel;
             });

             return $this->hotelRepository->find($createdHotel->id);
         } catch (\Throwable $th) {
             throw new UnExpectedException();
         }
    }

    public function updateHotel($hotel, $id)
    {
        try {
            $updatedHotel = $this->hotelRepository->update($hotel, $id);

            return !!$updatedHotel;
        } catch (\Throwable $th) {
            throw new UnExpectedException();
        }
    }

    public function getHotels()
    {
        try {
            return $this->hotelRepository->all();
        } catch (\Throwable $th) {
            throw new UnExpectedException();
        }
    }

    public function showHotel($id)
    {
        try {
            return $this->hotelRepository->find($id);
        } catch (\Throwable $th) {
            throw new UnExpectedException();
        }
    }

    public function deleteHotel($id)
    {
        try {
            return $this->hotelRepository->delete($id);
        } catch (\Throwable $th) {
            throw new UnExpectedException();
        }
    }

    public function bookAccommodation($id)
    {
        try {
            return $this->hotelRepository->bookAccommodation($id);
        } catch (\Throwable $th) {
            throw new UnExpectedException();
        }
    }
}
