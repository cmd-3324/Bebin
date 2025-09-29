<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class BebinUsers extends Authenticatable
{
      use Notifiable;
   protected $primaryKey = 'UserID'; 
    public $incrementing = true;      
    protected $keyType = 'int';
    protected $table = "bebin_users";
    protected $fillable = [
    'UserName',
    'SubscribersNum',
    'Age',
    'Video_num',
    'comments_num',
];
    
}
