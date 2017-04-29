<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepositories\Contracts\ProductRepositoryInterface;
use App\Repositories\OrderRepositories\Contracts\OrderRepositoryInterface;
//use App\Repositories\UserRepositories\Contracts\UserRepositoryInterface;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Http\Request;

class TestController extends Controller
{
    protected $productRepository;
    protected $orderRepository;
    protected $userRepository;
    public function __construct(ProductRepositoryInterface $productRepository,
                                OrderRepositoryInterface $orderRepository,
                                UserRepositoryInterface $userRepository)
    {
        $this->productRepository = $productRepository;
        $this->orderRepository = $orderRepository;
        $this->userRepository = $userRepository;
    }

    public function getAllProduct()
    {
        return $this->productRepository->getAll();
    }

    public function getAllOrder()
    {
        return $this->orderRepository->getAll();
    }

    public function getAllUser(){
        return $this->userRepository->getAll();
    }
}
