<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StickerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
            'freelance_price' => $this->freelance_price,
            'type' => ucfirst($this->type),
            'brand' => ucfirst($this->brand),
            'image' => $this->image,
        ];
    }
}
