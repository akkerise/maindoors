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

    private function decodeData($data)
    {
        return json_decode($data);
    }

    public function getAllUser()
    {
        if (!$this->redisService->getterRedis() || $this->redisService->getterRedis() === null) {
            $this->updateDatabaseWithRedis();
            return $this->userRepository->getAll();
        }
        $this->allUsers = $this->redisService->getterRedis();
        return $this->allUsers;
    }

    public function getUserLevel()
    {
        return $this->allUsers;
    }

    protected function arrayToObject($data)
    {
        return (object)$data;
    }


    public function setProductsOnRedis()
    {
        $products = Product::all();
        $this->redisService = new RedisService($products, 'products');
        $this->redisService->setterRedis();
        $this->redisService->reloadDataExpiresTime();
    }

    public function updateDatabaseWithRedis()
    {
        $users = $this->userRepository->getAll();
        $this->redisService = new RedisService($users, 'users');
        $this->redisService->setterRedis();
    }

}
