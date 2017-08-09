<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialAccout extends Model
{
    protected $fillable = ['user_id', 'provider_user_id', 'provider'];

    protected $hidden = ['level'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
