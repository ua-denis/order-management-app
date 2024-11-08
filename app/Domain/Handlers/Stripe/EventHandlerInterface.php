<?php

declare(strict_types=1);

namespace App\Domain\Handlers\Stripe;

interface EventHandlerInterface
{
    public function handle(object $event): void;
}
