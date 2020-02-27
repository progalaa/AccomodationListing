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

}
