<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'city' => $this->city,
            'area' => $this->area,
            'street_name' => $this->street_name,
            'building_name' => $this->building_name,
            'apartment_number' => $this->apartment_number,				
            'lat' => $this->lat,
            'lon' => $this->lon,
        ];
    }
}
