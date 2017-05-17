<?php
/**
 * Created by PhpStorm.
 * User: akke
 * Date: 4/29/17
 * Time: 11:58 AM
 */

namespace App\Repositories\InsteadRepositories\Eloquents;

use App\Repositories\InsteadRepositories\Contracts\InsteadRepositoryInterface;

class InsteadRepository implements InsteadRepositoryInterface
{
    public function getAll($nameModel)
    {
        return $nameModel::all();
    }
}