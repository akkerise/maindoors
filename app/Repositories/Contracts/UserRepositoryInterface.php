<?php
/**
 * Created by PhpStorm.
 * User: AkKe
 * Date: 4/25/2017
 * Time: 5:10 PM
 */
namespace App\Repositories\Contracts;

interface UserRepositoryInterface {
	public function getAll();
	public function getAllUserSortByParam($attr, $type);
	public function findId($id);
	public function getUserByAttr($attr, $param);
	public function insertNewUser($fullName, $username, $password, $email, $token);
}