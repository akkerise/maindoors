<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\UserRepositoryInterface;
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
        return $this->userRepository->getAll();
    }

    public function saveApiData(){
        $client = new Client();

    }
}
