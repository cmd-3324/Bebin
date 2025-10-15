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
        'ProfiltoPath',
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
    // HANdling Profile IMage show in Channel,Video Cards meta data ONLY! 
/**

     * @param  int  $id
     * @return string
     */
    public static function getProfileImagePathById($id)
    {
        $user = self::find($id);

        if ($user && $user->ProfiltoPath) {
            return asset('storage/app//public//Avatars/' . $user->ProfiltoPath);
        }

        // Default image if user doesn't have one
        return asset('storage\\app\\public\\GuestProfile.png');
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
