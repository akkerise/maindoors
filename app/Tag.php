<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags';

    protected $fillable = [
        'tag_name', 'description'
    ];

    public function tags()
    {
        return $this->hasMany('App\ImageTag');
    }

    public function blogs(){
        return $this->belongsTo('App\Blog');
    }
}
