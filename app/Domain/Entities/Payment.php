<?php

declare(strict_types=1);

namespace App\Domain\Entities;

use App\Domain\ValueObjects\Money;

class Payment
{
    private $id;
    private Money $amount;
    private string $status;

    public function __construct(string $id, Money $amount, string $status)
    {
        $this->id = $id;
        $this->amount = $amount;
        $this->status = $status;
    }

    public function getAmount(): Money
    {
        return $this->amount;
    }

    public function getStatus(): string
    {
        return $this->status;
    }
}
