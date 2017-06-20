<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepositories\Contracts\UserRepositoryInterface;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\User;

class APIController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAllUsers(){
        return response()->json($this->userRepository->getAll(),200)->header('Content-Type', 'text/plain');
    }

    public function getUserId($id){
        $userId = $this->userRepository->findId($id);

        return response()->json($userId,200);
    }
}
