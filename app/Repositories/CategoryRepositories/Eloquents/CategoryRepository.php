<?php
/**
 * Created by PhpStorm.
 * User: akke
 * Date: 5/1/17
 * Time: 2:12 AM
 */

namespace App\Repositories\CategoryRepositories\Eloquents;

use App\Categories;
use App\Repositories\CategoryRepositories\Contracts\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function getAll()
    {
        return Categories::all();
    }
}