<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Repositories\UserRepositories;

use App\Product;
use App\Services\RedisService;
use App\Repositories\UserRepositories\Contracts\UserRepositoryInterface;
use Doctrine\DBAL\Driver\PDOException;
use JWTAuthException;
use Illuminate\Support\Facades\Redis;

class UserService extends RedisService
{

    protected $userRepository;

    private $redisService;

    public $allUsers;

    public function __construct(UserRepositoryInterface $userRepository, RedisService $redisService)
    {
        $this->userRepository = $userRepository;
        $this->redisService = $redisService;
    }

    public function getUserByApiJWT($id)
    {
        try {
            $data = $this->userRepository->findId($id);
        } catch (PDOException $e) {
            dd($e->getMessage());
        }
        if (!$data) {
            return false;
        }
        return $data;
    }

    public function setAllUserOnRedis()
    {
        $users = $this->userRepository->getAll();
        $this->redisService = new RedisService($users, 'users');
        $this->redisService->setterRedis();
    }

    public function getAllUser()
    {
        if (empty($this->redisService->getterRedis())) {
            $this->serviceUpdateUser();
            return $this->userRepository->getAll();
        }
        $this->allUsers = $this->redisService->getterRedis();
        return json_decode($this->allUsers, true);
    }

    public function getUserLevel()
    {
        return $this->allUsers;
    }

    public function serviceUpdateUser()
    {
        $users = $this->userRepository->getAll();
        $this->redisService = new RedisService($users, 'users');
        $this->redisService->setterRedis();
    }

    public function getUserIdByAjax($id)
    {

        $user = $this->getAllUser();
        $collection = collect($user);
        $userId = $collection->where('id', $id);
        $userData = self::convertDataFromRedis($userId);

        if (!empty($userData)) {
            $userId->toArray();
            return $userData;
        }

        return $this->userRepository->findId($id);
    }

    private static function convertDataFromRedis($userData)
    {
        $data = [];
        foreach ($userData as $key => $value) {
            $data = $value;
        }
        return $data;
    }
}
