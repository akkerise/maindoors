<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageTag extends Model
{
    protected $table = 'image_tags';

    protected $fillable = [
        'image_id', 'tag_id'
    ];
}
