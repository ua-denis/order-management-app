<?php

declare(strict_types=1);

namespace App\Domain\Entities;

use App\Domain\ValueObjects\Money;
use App\Domain\ValueObjects\OrderStatus;

class Order
{
    private int $id;
    private OrderStatus $status;
    private Money $amount;
    private Payment $payment;

    public function __construct(int $id, Money $amount)
    {
        $this->id = $id;
        $this->status = new OrderStatus('pending');
        $this->amount = $amount;
    }

    public function markAsPaid(Payment $payment): void
    {
        if ($this->amount->equals($payment->getAmount())) {
            $this->status = new OrderStatus('paid');
            $this->payment = $payment;
        }
    }

    public function markAsFailed(): void
    {
        $this->status = new OrderStatus('failed');
    }

    public function getStatus(): string
    {
        return $this->status->getStatus();
    }
}
