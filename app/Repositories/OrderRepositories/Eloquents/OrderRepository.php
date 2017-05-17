<?php
/**
 * Created by PhpStorm.
 * User: akke
 * Date: 4/29/17
 * Time: 9:39 AM
 */

namespace App\Repositories\OrderRepositories\Eloquents;

use App\Repositories\OrderRepositories\Contracts\OrderRepositoryInterface;
use App\Order;

class OrderRepository implements OrderRepositoryInterface
{
    public function getAll()
    {
        return Order::all();
    }
}