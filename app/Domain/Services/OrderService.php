<?php

declare(strict_types=1);

namespace App\Domain\Services;

use App\Domain\Repositories\OrderRepository;
use Exception;
use Illuminate\Support\Facades\Log;

class OrderService
{
    protected OrderRepository $orderRepository;
    
    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    /**
     * @throws Exception
     */
    public function markAsPaid(string $chargeId): void
    {
        $order = $this->orderRepository->findByChargeId($chargeId);

        if (!$order) {
            throw new Exception("Order with charge ID {$chargeId} not found.");
        }

        $this->orderRepository->updateStatus($order, 'paid');
        Log::info("Order {$order->id} marked as paid.");
    }

    /**
     * @throws Exception
     */
    public function markAsFailed(string $chargeId): void
    {
        $order = $this->orderRepository->findByChargeId($chargeId);

        if (!$order) {
            throw new Exception("Order with charge ID {$chargeId} not found.");
        }

        $this->orderRepository->updateStatus($order, 'failed');
        Log::info("Order {$order->id} marked as failed.");
    }


    public function getStatus(string $chargeId): ?string
    {
        return $this->orderRepository->findByChargeId($chargeId)?->status;
    }
}
