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

    public function getAllUser()
    {
        if (!$this->redisService->getterRedis() || $this->redisService->getterRedis() === null) {
            $this->serviceUpdateUser();
            return $this->userRepository->getAll();
        }
        $this->allUsers = $this->redisService->getterRedis();
        return $this->allUsers;
    }

    public function getUserByIdOnRedis($id){

    }

    public function getUserLevel()
    {
        return $this->allUsers;
    }

    protected function arrayToObject($data)
    {
        return (object)$data;
    }

    public function serviceUpdateUser()
    {
        $users = $this->userRepository->getAll();
        $this->redisService = new RedisService($users, 'users');
        $this->redisService->setterRedis();
    }

    public function getUserIdByAjax($id){
        $user = $this->getAllUser();
        echo "<pre>"; var_dump($user[7]); echo "</pre>"; die();
        if ($user[$id]){
            return $user[$id];
        }
        return $this->userRepository->findId($id);
    }
}
