<?php

namespace App\Http\Controllers;

use App\Http\Resources\HotelCollection;
use App\Http\Resources\HotelResource;
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
        $hotel = $this->hotelService->create($request->all());

        return response()->json([HotelResource::$wrap => new HotelResource($hotel)]);
    }


    public function show($id)
    {
        $hotel = $this->hotelService->showHotel($id);

        return response()->json([HotelResource::$wrap => new HotelResource($hotel)]);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $hotel = $this->hotelService->deleteHotel($id);

        return ($hotel) ? response()->json(['success' => true]) : false;
    }
}
