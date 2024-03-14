<?php

namespace App\Http\Resources\Traits;

use Illuminate\Support\Facades\Storage;

trait EncodesMediaUrls
{
    /**
     * Encode media file names in URLs to ensure they are URL-safe.
     *
     * @param  array  $files
     * @return array
     */
    public function encodeMediaUrls(array $files): array
    {
        return array_map(function ($filePath) {
            // Split the path by '/' to separate directories and the filename
            $pathParts = explode('/', $filePath);

            // Encode the filename part, which is the last part of the path
            $pathParts[count($pathParts) - 1] = urlencode(end($pathParts));

            // Rebuild the path with the encoded filename part
            $encodedFilePath = implode('/', $pathParts);

            // Generate a full URL for the encoded file path
            return Storage::url($encodedFilePath);
        }, $files);
    }
}
