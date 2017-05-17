<?php
/**
 * Created by PhpStorm.
 * User: akke
 * Date: 4/29/17
 * Time: 11:58 AM
 */

namespace App\Repositories\InsteadRepositories\Contracts;

interface InsteadRepositoryInterface
{
    public function getAll($nameModel);
}