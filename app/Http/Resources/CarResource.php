<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Traits\HandlesImages;

class CarResource extends JsonResource
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
            'brand_id' => $this->brand->id,
            'brand_name' => $this->brand->name,
            'name' => $this->name,
            'image' => $this->getImageUrl($this->image),
        ];
    }
}
