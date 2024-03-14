<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Traits\HandlesImages;

class ProductResource extends JsonResource
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
            'name' => $this->name,
            'image' => $this->getImageUrl($this->image),
            'title' => $this->title,
            'description' => $this->description,
        ];
    }
}
