<?php
/**
 * Created by PhpStorm.
 * User: akke
 * Date: 5/1/17
 * Time: 2:33 AM
 */
namespace App\Repositories\NewsRepositories\Eloquents;

use App\News;
use App\Repositories\NewsRepositories\Contracts\NewsRepositoryInterface;

class NewsRepository implements NewsRepositoryInterface
{
    public function getAll()
    {
        return News::all();
    }
}