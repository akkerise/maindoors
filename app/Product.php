<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['name','price','type','images','keyword','description','user_id','cate_id'];

    public function categories(){
        return $this->belongsTo('App\Categories');
    }

    public function productCustomField(){
        return $this->hasMany('App\ProductCustomField');
    }

}
