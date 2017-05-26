<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomField extends Model
{
    protected $table = 'custom_fields';
    protected $fillable = ['name', 'value'];
    public $timestamps = false;

    public function productCustomField()
    {
        return $this->hasMany('App\ProductCustomField');
    }
}
