<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OurClientResource extends JsonResource
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
            'name' => $this->name,
            'description' => $this->description,
            'image_url' => $this->media->isNotEmpty() ? $this->media->last()->getFullUrl() : NULL,
        ];
    }
}
