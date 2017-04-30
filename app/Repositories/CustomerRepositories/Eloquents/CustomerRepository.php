<?php

/**
 * Created by PhpStorm.
 * User: akke
 * Date: 5/1/17
 * Time: 1:53 AM
 */

namespace App\Repositories\CustomerRepositories\Eloquents;

use App\Customer;
use App\Repositories\CustomerRepositories\Contracts\CustomerRepositoryInterface;

class CustomerRepository implements CustomerRepositoryInterface
{
    public function getAll()
    {
        return Customer::all();
    }
}