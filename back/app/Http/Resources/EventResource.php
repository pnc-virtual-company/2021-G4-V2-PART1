<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
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
            // 'title'=>$this->title,
            // 'description'=>$this->description,
            'departureDate'=>$this->departureDate->format('j,l F Y | h:i:s A'),
            'arrivalDate'=>$this->arrivalDate->format('j,l F Y | h:i:s A'),
            // 'city'=>$this->city,
            // 'country'=>$this->country,
            // 'category_id'=>$this->category_id,
            // 'user_id'=>$this->user_id,
            // 'imagename'=>$this->imagename,
        ];
    }
}
