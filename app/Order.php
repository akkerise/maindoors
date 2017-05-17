<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
//    protected $fillable = ['name','ordercode','payment_type','payment_method','payment_total_order','address','information','status','voucher_percent','voucher_money','customer_id'];
    protected $fillable = ['name','order_code','payment_type','payment_method','price','information','transaction_status','voucher_percent','voucher_money','customer_id','transaction_info','payment_id','error_text','secure_code','user_id'];

    public function product(){
        return $this->hasMany('App\Product');
    }

}
