<?php

declare(strict_types=1);

namespace App\Domain\DTOs;

class OrderDTO
{
    public string $orderId;
    public string $status;

    public function __construct(string $orderId, string $status)
    {
        $this->orderId = $orderId;
        $this->status = $status;
    }
}
