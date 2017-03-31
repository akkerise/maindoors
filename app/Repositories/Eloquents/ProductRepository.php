<?php
/**
 * Created by PhpStorm.
 * User: akke
 * Date: 31/03/2017
 * Time: 03:33
 */
namespace App\Repositories\Eloquents;

use App\Product;

class ProductRepository {

    public function all(){
        return Product::all();
    }

    public function show($id){
        return Product::find($id);
    }

}

