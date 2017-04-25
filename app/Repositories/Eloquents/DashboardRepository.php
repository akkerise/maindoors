<?php
/**
 * Created by PhpStorm.
 * User: AkKe
 * Date: 4/25/2017
 * Time: 4:21 PM
 */

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\DashboardRepositoryInterface;
use App\User;

class DashboardRepository implements DashboardRepositoryInterface
{

    public function all()
    {
        return User::all();
    }

    public function find($id)
    {
        return User::findOrFail($id);
    }

    public function getUserAttr($attr, $param)
    {
        return User::all()->where($attr, $param);
    }

}