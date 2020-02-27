<?php

namespace App\Http\Controllers;

use App\Http\Resources\HotelCollection;
use App\Services\HotelService;
use Illuminate\Http\Request;

class HotelController extends Controller
{

    protected $hotelService;

    public function __construct(HotelService $hotelService)
    {
        $this->hotelService = $hotelService;
    }


    public function index()
    {
        $hotels = $this->hotelService->getHotels();

        return response()->json([HotelCollection::$wrap => new HotelCollection($hotels)]);
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
