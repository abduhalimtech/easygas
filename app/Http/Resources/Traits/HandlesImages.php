<?php

namespace App\Http\Resources\Traits;

use TCG\Voyager\Facades\Voyager;

trait HandlesImages
{
    protected function getImageUrl($imageField, $defaultPath = '/storage/users/default.png'): string
    {
        $defaultImagePath = url($defaultPath);

        // Attempt to decode the image field as JSON
        $decodedImage = json_decode($imageField, true);
        // Try to get the file from the decoded JSON
        $file = $decodedImage[0]['download_link'] ?? null;

        // If a file is found in the JSON, return its Voyager URL
        if ($file) {
            return Voyager::image($file);
        }

        // If the file isn't found, but Voyager::image($imageField) is a valid URL, return it
        $voyagerImageUrl = Voyager::image($imageField);
        if ($voyagerImageUrl && $voyagerImageUrl !== $imageField) {
            return $voyagerImageUrl;
        }

        // If none of the above conditions are met, return the default image path
        return $defaultImagePath;
    }
}
