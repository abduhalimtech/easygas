<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Traits\EncodesMediaUrls;

class NewsResource extends JsonResource
{
    use EncodesMediaUrls;

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        $files = json_decode($this->file, true);

        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'files' => $this->encodeMediaUrls($files),
            'created_at' => $this->created_at->toDateTimeString(),
        ];
    }
}
