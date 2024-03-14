<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Traits\HandlesImages;

class BranchResource extends JsonResource
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
            'region' => $this->region->name,
            'name' => $this->name,
            'description' => $this->description,
            'address' => $this->address,
            'address_link' => $this->address_link,
            'image' => $this->getImageUrl($this->image),
            'first_additional_field' => $this->first_additional_field,
            'second_additional_field' => $this->second_additional_field,
        ];
    }
}
