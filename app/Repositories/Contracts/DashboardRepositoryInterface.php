<?php
/**
 * Created by PhpStorm.
 * User: AkKe
 * Date: 4/25/2017
 * Time: 5:10 PM
 */
namespace App\Repositories\Contracts;

interface DashboardRepositoryInterface {
    public function all();
    public function find($id);
    public function getUserAttr($attr,$param);
}