<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';
    protected $fillable = ['name','address','phonenumber','accept_time','created_time'];
    protected $hidden = [];
    public function product(){
        return $this->hasMany('App\Order');
    }
}
