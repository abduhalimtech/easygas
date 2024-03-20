<?php

namespace App\Http\Resources;

use App\Http\Resources\Traits\HandlesImages;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
{
    use HandlesImages;
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'car_name' => $this->car->name,
            'car_image' => $this->getImageUrl($this->car->image),
            'phone_number' => $this->phone_number,
        ];
    }
}
