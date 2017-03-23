<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = ['name','ordercode','payment_type','payment_total_order','address','information','status','voucher_percent','voucher_money','customer_id'];
}
