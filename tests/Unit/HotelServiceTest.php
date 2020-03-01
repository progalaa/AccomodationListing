<?php

namespace Tests\Unit;

use App\Exceptions\UnExpectedException;
use App\Hotel;
use App\Services\HotelService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HotelServiceTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected $hotelService;

    protected function setUp(): void
    {
        $this->hotelService = app()->make(HotelService::class);
        parent::setUp();
    }

    /** @test */
    public function it_can_create_new_hotel()
    {
        $hotel = factory('App\Hotel')->create();

        $addedHotel = $this->hotelService->create($hotel->toArray());

        $this->assertEquals($addedHotel->name, $hotel->name);
    }

    /** @test */
    public function it_gets_created_hotel()
    {
        $hotel = factory('App\Hotel')->create();

        $addedHotel = $this->hotelService->create($hotel->toArray());

        $this->assertIsObject($addedHotel);
    }

    /** @test */
    public function it_can_return_all_hotels()
    {
        $hotels = factory('App\Hotel', 4)->create();

        $getHotels = $this->hotelService->getHotels();

        $this->assertEquals($getHotels->count(), $hotels->count());
    }


    /** @test */
    public function it_can_get_one_hotel_by_id()
    {
        $hotel = factory('App\Hotel')->create();

        $getOne = $this->hotelService->showHotel($hotel->id);

        $this->assertEquals($getOne->id, $hotel->id);
    }

    /** @test */
    public function it_throws_when_hotel_not_found()
    {
        $this->expectException(UnExpectedException::class);

        $this->hotelService->showHotel(1);
    }

    /** @test */
    public function it_can_update_exist_prodcut()
    {
        $hotel = factory('App\Hotel')->create();
        $newHotel = factory('App\Hotel')->create();

        $hoteUpdated = $this->hotelService->updateHotel(
            $newHotel->toArray(),
            $hotel['id']
        );

        $this->assertTrue($hoteUpdated);
    }

    /** @test */
    public function it_can_delete_hotel_by_id()
    {
        $hotel = factory('App\Hotel')->create();

        $delete = $this->hotelService->deleteHotel($hotel->id);

        $this->assertTrue($delete);
        $this->assertEmpty(Hotel::all());
    }

    /** @test */
    public function it_can_book_a_hotel()
    {
        $hotel = factory('App\Hotel')->create();

        $booked = $this->hotelService->bookAccommodation($hotel->id);

        $this->assertTrue($booked);
    }

    /** @test */
    public function it_failed_to_book_a_hotel()
    {
        $hotel = factory('App\Hotel')->create(['availability' => 0]);

        $booked = $this->hotelService->bookAccommodation($hotel->id);

        $this->assertFalse($booked);
    }
}
