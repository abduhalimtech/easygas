<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\NewsResource;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class NewsController extends Controller
{
    public function index()
    {
        $items = News::all();
        return NewsResource::collection($items);
    }

    public function showVideo($filename)
    {
        $path = storage_path('app/public/storage/' . $filename);

        if (!File::exists($path)) {
            abort(404);
        }

        $headers = [
            'Content-Type' => 'video/mp4',
            'Content-Disposition' => 'inline; filename="'.$filename.'"'
        ];

        return response()->file($path, $headers);
    }


}
