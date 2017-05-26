<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $table = 'images';
    protected $fillable = [
        'image', 'user_id'
    ];

    public function images()
    {
        return $this->hasMany('App\ImageTag');
    }
}
