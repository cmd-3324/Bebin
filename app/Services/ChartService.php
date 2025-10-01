<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class ChartService
{
    public static function uploadVideo($file)
    {
        try {
            // Store file and return the path
            return $file->store('videos', 'public');
        } catch (\Exception $e) {
            return false;
        }
    }
}