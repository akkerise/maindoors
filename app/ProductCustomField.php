<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCustomField extends Model
{
    protected $table = 'product_custom_fields';
    protected $fillable = ['custom_field_id','product_id'];
}
