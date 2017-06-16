<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Product;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fullname', 'username',  'password', 'email', 'address' , 'gender' , 'confirmed' , 'description', 'confirm_code', 'image_avatar', 'remember_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password','level'
    ];

    public function product(){
        return $this->hasMany('Product');
    }

    public function images(){
        return $this->hasMany('App\Images');
    }

    public function blogs(){
        return $this->hasMany('App\Blog');
    }

    public function comments(){
        return $this->hasMany('App\Comment');
    }

//    public function checkLevel($username){
//        $user = $this->all()->where('username',$username)->first();
//        $level = $user->level;
//        return $level;
//    }
}
