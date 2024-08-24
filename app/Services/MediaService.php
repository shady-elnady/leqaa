<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaService
{
    /**
     * Upload media.
     *
     * @param \Illuminate\Http\Request $request Incoming request.
     * @param string                   $key     File key name.
     * @param string                   $disk    Disk name.
     *
     */
    public static function upload(Request $request, string $key)
    {
        $file = $request->file($key);

        $fileName = $file->getClientOriginalName();

        $path = $file->storeAs('uploads', $fileName, 'public');

        $url = config('app.url') . '/public/storage/' . ($path);

        return $url;
    }
}
