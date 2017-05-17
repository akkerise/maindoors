<?php
/**
 * Created by PhpStorm.
 * User: akke
 * Date: 5/1/17
 * Time: 2:32 AM
 */

namespace App\Repositories\CustomFieldRepositories\Eloquents;

use App\CustomField;
use App\Repositories\CustomFieldRepositories\Contracts\CustomFieldRepositoryInterface;

class CustomFieldRepository implements CustomFieldRepositoryInterface
{
    public function getAll()
    {
        return CustomField::all();
    }
}