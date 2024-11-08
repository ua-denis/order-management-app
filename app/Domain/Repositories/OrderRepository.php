<?php

declare(strict_types=1);

namespace App\Domain\Repositories;

use App\Domain\Models\Order;

class OrderRepository
{
    public function findByChargeId(string $chargeId): ?Order
    {
        return Order::where('charge_id', $chargeId)->first();
    }
    
    public function updateStatus(Order $order, string $status): void
    {
        $order->update(['status' => $status]);
    }
}
