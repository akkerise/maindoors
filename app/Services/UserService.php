<?php

namespace App\Services;


use App\Repositories\UserRepositories\Contracts\UserRepositoryInterface;
use Doctrine\DBAL\Driver\PDOException;
use JWTAuthException;
use JWTAuth;


class UserService
{

    protected $userRepository;
    private $apiURL = 'http://localhost:8000/api/user';

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getUserByApiJWT($id)
    {
        try{
            $data = $this->userRepository->findId($id);
        }catch (PDOException $e){
            dd($e->getMessage());
        }
        if (!$data) {
            return false;
        }
        return $data;
    }
}