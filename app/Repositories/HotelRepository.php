<?php


namespace App\Repositories;


use App\Hotel;
use Prettus\Repository\Eloquent\BaseRepository;

class HotelRepository extends BaseRepository
{
    public function model()
    {
        return Hotel::class;
    }


    public function bookAccommodation($id)
    {
        $hotel = $this->find($id);
        $updated = false;
        if ($hotel->availability) {
            $this->update([
                'availability' => $hotel->availability - 1
            ], $hotel->id);
            $updated = true;
        }

        return $updated;
    }
}
