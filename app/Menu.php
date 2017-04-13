<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menus';
    protected $fillable = ['name','cate_id','parent_id'];

    public function news(){
        return $this->belongsTo('App\Menu');
    }
}
