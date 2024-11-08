<?php

declare(strict_types=1);

namespace App\Domain\ValueObjects;

class Money
{
    private float $amount;
    private string $currency;

    public function __construct(float $amount, string $currency)
    {
        $this->amount = $amount;
        $this->currency = $currency;
    }

    public function equals(Money $other): bool
    {
        return $this->amount === $other->getAmount() && $this->currency === $other->getCurrency();
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }
}
