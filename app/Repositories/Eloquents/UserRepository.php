<?php
/**
 * Created by PhpStorm.
 * User: AkKe
 * Date: 4/25/2017
 * Time: 4:21 PM
 */

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\UserRepositoryInterface;
use App\User;
use Hash;

class UserRepository implements UserRepositoryInterface
{

    public function all()
    {
        return User::all();
    }

    public function getAllUserSortByParam($attr, $type = false)
    {
        if (($type === "ASC") || ($type === NULL) || ($type === "") || !isset($type) || empty($type)) {
            return User::all()->sortBy($attr);
        }
        if ($type === "DESC") {
            return User::all()->sortByDesc($attr);
        }
    }

    public function find($id)
    {
        return User::all()->find($id);
    }

    public function getUserByAttr($attr, $param)
    {
        return User::all()->where($attr, $param);
    }

    public function insertNewUser($fullname, $username, $password, $email, $token)
    {
        $newUser = new User;
        $newUser->fullname = $fullname;
        $newUser->username = $username;
        $newUser->password = Hash::make($password);
        $newUser->email = $email;
        $newUser->remember_token = $token;
        $newUser->confirm_code = Hash::make($fullname);
        $newUser->total_money = 0;
        $newUser->level = 2;
        $newUser->confirmed = false;
        $newUser->save();
    }
}