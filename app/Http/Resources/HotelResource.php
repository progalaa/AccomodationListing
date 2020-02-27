<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HotelResource extends JsonResource
{

    public static $wrap = 'hotel';
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $location = new HotelLocationResource($this->location);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'rating' => $this->rating,
            'category' => $this->category,
            $location::$wrap => $location,
            'image' => $this->image,
            'reputation' => $this->reputation,
            'reputationBadge' => $this->reputationBadge,
            'price' => $this->price,
            'availability' => $this->availability
        ];
    }
}
