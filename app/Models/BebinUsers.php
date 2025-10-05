<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contacts\Auth\MustverifyEmailCode;
//implements MustverifyEmailCode
class BebinUsers extends Authenticatable 
{
    use Notifiable;

    protected $primaryKey = 'UserID';    
    public $incrementing = true;
    protected $keyType = 'int';
    protected $table = "bebin_users";

    protected $fillable = [
        'UserName',
        'email',
        'password',
        'SubscribersNum',
        'Age',
        'Video_num',
        'comments_num',
    ];
     protected $hidden = [
        'password',
        'remember_token',
    ];


    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function videos()
    {
        return $this->hasMany(VideoStorageMetadata::class, 'UserID', 'UserID');
    }

    public function sharedVideos()
    {
        return $this->belongsToMany(
            VideoStorageMetadata::class,
            'bebin_user_video_storage_metadata',
            'UserID',
            'video_storage_id'
        );
    }
}
