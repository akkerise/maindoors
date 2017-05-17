<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepositories\Contracts\CategoryRepositoryInterface;
use App\Repositories\CustomerRepositories\Contracts\CustomerRepositoryInterface;
use App\Repositories\OrderRepositories\Contracts\OrderRepositoryInterface;
use App\Repositories\ProductRepositories\Contracts\ProductRepositoryInterface;
use App\Repositories\UserRepositories\Contracts\UserRepositoryInterface;
use App\Repositories\MenuRepositories\Contracts\MenuRepositoryInterface;
use App\Repositories\NewsRepositories\Contracts\NewsRepositoryInterface;
use App\Repositories\ProductCustomFieldRepositories\Contracts\ProductCustomFieldRepositoryInterface;
use App\Repositories\CustomFieldRepositories\Contracts\CustomFieldRepositoryInterface;

// use App\Repositories\Contracts\UserRepositoryInterface;

class TestController extends Controller
{
    protected $productRepository;
    protected $orderRepository;
    protected $userRepository;
    protected $customerRepository;
    protected $categoryRepository;
    protected $menuRepository;
    protected $newsRepository;
    protected $productcustomfieldRepository;
    protected $customfieldRepository;

    public function __construct(ProductRepositoryInterface $productRepository,
                                OrderRepositoryInterface $orderRepository,
                                UserRepositoryInterface $userRepository,
                                CustomerRepositoryInterface $customerRepository,
                                CategoryRepositoryInterface $categoryRepository,
                                MenuRepositoryInterface $menuRepository,
                                NewsRepositoryInterface $newsRepository,
                                ProductCustomFieldRepositoryInterface $productcustomfieldRepository,
                                CustomFieldRepositoryInterface $customfieldRepository
    )
    {
        $this->productRepository = $productRepository;
        $this->orderRepository = $orderRepository;
        $this->userRepository = $userRepository;
        $this->customerRepository = $customerRepository;
        $this->categoryRepository = $categoryRepository;
        $this->newsRepository = $newsRepository;
        $this->customfieldRepository = $customfieldRepository;
        $this->productcustomfieldRepository = $productcustomfieldRepository;
        $this->menuRepository = $menuRepository;
    }

    public function getAllProduct()
    {
        return $this->productRepository->getAll();
    }

    public function getAllOrder()
    {
        return $this->orderRepository->getAll();
    }

    public function getAllUser()
    {
        return $this->userRepository->getAll();
    }

    public function getInstead($nameModel)
    {
        $currentNameModel = $nameModel;
        $nameModel = ucfirst($nameModel);
        if ($currentNameModel === 'product' || $currentNameModel === 'products') {
            return $this->productRepository->getAll($nameModel);
        }
        if ($currentNameModel === 'user' || $currentNameModel === 'users') {
            return $this->userRepository->getAll($nameModel);
        }
        if ($currentNameModel === 'order' || $currentNameModel === 'orders') {
            return $this->orderRepository->getAll($nameModel);
        }
        return "Your Data Not Found";
    }

    public function getAllCustomer()
    {
        return $this->customerRepository->getAll();
    }

    public function getAllCategory()
    {
        return $this->categoryRepository->getAll();
    }

    public function getAllCustomField()
    {
        return $this->customfieldRepository->getAll();
    }

    public function getAllMenu()
    {
        return $this->menuRepository->getAll();
    }

    public function getAllProductCustomField()
    {
        return $this->productcustomfieldRepository->getAll();
    }

    public function getAllNews()
    {
        return $this->newsRepository->getAll();
    }
}
