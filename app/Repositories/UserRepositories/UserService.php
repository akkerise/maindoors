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
use JWTAuth;
use Redis;

class UserService extends RedisService {
    
    const API_URL = 'http://localhost:8000/api/user';

    protected $userRepository;

    private $userService;

    public $allUsers;

    public function __construct(UserRepositoryInterface $userRepository, RedisService $userService) {
        $this->userRepository = $userRepository;
        $this->userService = $userService;
    }

    public function getUserByApiJWT($id) {
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

    public function setAllUserOnRedis() {
        $users = $this->userRepository->getAll();
        $this->userService = new RedisService($users, 'users');
        $this->userService->setterRedis();
        $this->userService->reloadDataExpiresTime();
    }

    private function decodeData($data) {
        return json_decode($data);
    }

    private function getAllUserByRepository() {
        return $this->userRepository->getAll();
    }

    private function getAllUserByRedis() {
        return $this->userService->getterRedis();
    }

    public function getAllUser() {
        $flag = 0;
        $flag++;
        if ($flag === 1) {
            $this->setAllUserOnRedis();
        }
        if (!$this->getAllUserByRedis() || $this->getAllUserByRedis() === null) {
            return $this->getAllUserByRepository();
        }
        $this->allUsers = $this->decodeData($this->getAllUserByRedis());
        return $this->allUsers;
    }

    public function getUserLevel() {
        return $this->allUsers;
    }

    protected function arrayToObject($data) {
        return (object) $data;
    }


    public function setProductsOnRedis(){
        $products = Product::all();
        $this->userService = new RedisService($products, 'products');
        $this->userService->setterRedis();
        $this->userService->reloadDataExpiresTime();
    }
}
