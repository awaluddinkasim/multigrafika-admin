<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'order_id' => $this->order_id,
            'sticker' => new StickerResource($this->sticker),
            'price' => $this->price,
            'freelance_price' => $this->freelance_price,
            'status' => $this->status,
            'created_at' => $this->created_at,
        ];
    }
}
