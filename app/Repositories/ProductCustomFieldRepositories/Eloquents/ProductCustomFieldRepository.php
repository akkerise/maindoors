<?php
/**
 * Created by PhpStorm.
 * User: akke
 * Date: 5/1/17
 * Time: 2:33 AM
 */

namespace App\Repositories\ProductCustomFieldRepositories\Eloquents;

use App\ProductCustomField;
use App\Repositories\ProductCustomFieldRepositories\Contracts\ProductCustomFieldRepositoryInterface;

class ProductCustomFieldRepository implements ProductCustomFieldRepositoryInterface
{
    public function getAll()
    {
        return ProductCustomField::all();
    }
}