<?php

declare(strict_types=1);

namespace App\Domain\ValueObjects;

class OrderStatus
{
    private string $status;

    public function __construct(string $status)
    {
        $this->status = $status;
    }

    public function getStatus(): string
    {
        return $this->status;
    }
}
