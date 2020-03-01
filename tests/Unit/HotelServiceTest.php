<?php

namespace Tests\Unit;

use App\Services\HotelService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use PHPUnit\Framework\TestCase;

class HotelServiceTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected $hotelService;

    protected function setUp(): void
    {
        $this->hotelService = app()->make(HotelService::class);
        parent::setUp();
    }
}
