<?php

declare(strict_types=1);

namespace App\Domain\Handlers\Stripe;

use App\Domain\Services\OrderService;
use Exception;

class ChargeSucceededHandler implements EventHandlerInterface
{
    protected OrderService $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    /**
     * @throws Exception
     */
    public function handle(object $event): void
    {
        $chargeId = $event->data->object->id;
        $this->orderService->markAsPaid($chargeId);
    }
}
