<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Subscription extends Pivot
{
    protected $table = "subscriptions";
    protected $fillable = [
        'subscribed_to_id',
        'subscriber_id',

];
    public function subscriptions()
{
    return $this->belongsToMany(BebinUsers::class, 'subscriptions', 'subscriber_id', 'subscribed_to_id')
                ->using(Subscription::class)
                ->withTimestamps();
}


}
