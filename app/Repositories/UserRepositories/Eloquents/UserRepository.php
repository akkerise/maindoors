<?php
/**
 * Created by PhpStorm.
 * User: AkKe
 * Date: 4/25/2017
 * Time: 4:21 PM
 */

namespace App\Repositories\UserRepositories\Eloquents;

use App\Repositories\UserRepositories\Contracts\UserRepositoryInterface;
use App\User;
use Doctrine\DBAL\Driver\PDOException;
use Hash;
use Faker;
use App\Mail\RegisterUser;
use Illuminate\Support\Facades\Mail;

class UserRepository implements UserRepositoryInterface
{

    public function getAll()
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

    public function findId($id)
    {
        return User::all()->find($id);
    }

    public function getUserByAttr($attr, $param)
    {
        return User::all()->where($attr, $param);
    }

    public function insertNewUser($data)
    {
        $faker = Faker\Factory::create();
        $token = array_shift($data);
        $data['address'] = $faker->address;
        $data['gender'] = rand(1, 4);
        $data['description'] = $faker->text;
        $data['total_money'] = $faker->numberBetween($min = 10000, $max = 999999999);
        $data['confirm_code'] = md5($data['email']);
        $data['confirmed'] = FALSE;
        $data['level'] = rand(3, 4);
        $data['image_avatar'] = $faker->imageUrl($width = 1000, $height = 1000);
        $data['password'] = Hash::make($data['password']);
        $data['remember_token'] = $token;

        $newUser = new User($data);
        try {
            $newUser->save();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
        $idNewUser = $this->getUserByAttr('email', $data['email'])->first()->id;
        $resultEmail = $this->sendMailNewUser($idNewUser, $data);
        if ($resultEmail === true) {
            return true;
        } else {
            return false;
        }
    }

    public function updateUserInfo($data, $id)
    {
        $updateUser = $this->findId($id);
        foreach ($data as $k => $v) {
            if ($k === '_token') {
                continue;
            }
            $updateUser->$k = $v;
        }
        try {
            $updateUser->save();
        } catch (PDOException $e) {
            return $e->getMessage();
        }
        return true;
    }

    private function sendMailNewUser($idNewUser, $data)
    {
        $md5EmailNewUser = md5($data['email']);
        try{
            Mail::to($data['email'])->send(new RegisterUser($idNewUser, $md5EmailNewUser));
        }catch (\Exception $e){
            return $e->getMessage();
        }
        return true;
    }
}