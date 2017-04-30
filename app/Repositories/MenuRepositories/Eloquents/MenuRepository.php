<?php
/**
 * Created by PhpStorm.
 * User: akke
 * Date: 5/1/17
 * Time: 2:32 AM
 */
namespace App\Repositories\MenuRepositories\Eloquents;

use App\Menu;
use App\Repositories\MenuRepositories\Contracts\MenuRepositoryInterface;

class MenuRepository implements MenuRepositoryInterface
{
    public function getAll()
    {
        return Menu::all();
    }
}