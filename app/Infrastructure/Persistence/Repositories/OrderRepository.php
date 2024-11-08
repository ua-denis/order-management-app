<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Repositories;

use App\Domain\Models\Order;

class OrderRepository
{
    public function findByTenant($tenantId)
    {
        return Order::where('tenant_id', $tenantId)->get();
    }

    public function findPendingOrders()
    {
        return Order::where('status', 'pending')->get();
    }
}
