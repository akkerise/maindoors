<?php

namespace App\Services;

use App\Repositories\UserRepositories\Contracts\UserRepositoryInterface;
use Doctrine\DBAL\Driver\PDOException;
use JWTAuthException;
use JWTAuth;
use Redis;
use App\Services\RedisService;

class UserService {

    protected $userRepository;
    private $apiURL = 'http://localhost:8000/api/user';
    private $userService;

    public function __construct(UserRepositoryInterface $userRepository, RedisService $userService) {
        $this->userRepository = $userRepository;
        $this->userService = $userService;
        $this->setUserByRedis();
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
    
    private function setUserByRedis() {
        $users = json_encode($this->userRepository->getAll());
        $this->userService = new RedisService($users, 'users');
        $this->userService->setterRedis();
        $this->userService->reloadDataExpiresTime();
    }

    public function getUserByRedis() {
        return json_decode($this->userService->getterRedis());
    }
    
    
    public function arrayToObject($data){
        return (object)$data;
    }
    

}
