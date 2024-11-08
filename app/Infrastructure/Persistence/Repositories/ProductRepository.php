<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Repositories;

use App\Domain\Models\Product;

class ProductRepository
{
    public function findByTenant($tenantId)
    {
        return Product::where('tenant_id', $tenantId)->get();
    }

    public function create($data)
    {
        return Product::create($data);
    }
}
