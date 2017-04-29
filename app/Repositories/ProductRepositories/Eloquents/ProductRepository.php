<?php
/**
 * Created by PhpStorm.
 * User: akke
 * Date: 4/29/17
 * Time: 8:49 AM
 */
namespace App\Repositories\ProductRepositories\Eloquents;

use App\Repositories\ProductRepositories\Contracts\ProductRepositoryInterface;
use App\Product;

class ProductRepository implements ProductRepositoryInterface {
    public function getAll()
    {
        return Product::all();
    }
}