<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepositories\Contracts\UserRepositoryInterface;

class APIController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAllUsers()
    {
        $user = $this->userRepository->getAll();
//        return response()->json($this->userRepository->getAll(), 200)->header('Content-Type', 'text/plain');
        return response()->view('welcome', compact('user'), 200)->header('Content-Type', 'application/json');
    }

    public function getUserId($id)
    {
        $userId = $this->userRepository->findId($id);
        return response()->json($userId, 200);
    }
}
