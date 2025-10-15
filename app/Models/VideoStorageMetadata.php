<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VideoStorageMetadata extends Model
{
    protected $table = "video_storage_metadata";

    protected $fillable = [
        'UserID',
        'title',
        'description',
        'videoPath',
        'OriginalFilename',
        'Downloads',
        'Likes',
        'IsRestricted',
        'Dislikes',
    ];

    public function user()
    {
        return $this->belongsTo(BebinUsers::class, 'UserID', 'UserID');
    }

    public function users()
    {
        return $this->belongsToMany(
            BebinUsers::class,
            'bebin_user_video_storage_metadata',
            'video_storage_id',
            'UserID'
        );
    }
}
