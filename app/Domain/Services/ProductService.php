<?php

declare(strict_types=1);

namespace App\Domain\Services;

use App\Infrastructure\Persistence\Repositories\ProductRepository;

class ProductService
{
    protected ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function listProducts($tenantId)
    {
        return $this->productRepository->findByTenant($tenantId);
    }

    public function createProduct($data)
    {
        return $this->productRepository->create($data);
    }
}
