<?php

declare(strict_types=1);

namespace App\Infrastructure\Stripe;

use App\Domain\Handlers\Stripe\EventHandlerInterface;

class EventHandlerFactory
{
    private array $handlers = [];

    public function __construct(array $handlers = [])
    {
        $this->registerHandlers($handlers);
    }

    public function registerHandler(string $eventType, EventHandlerInterface $handler): void
    {
        $this->handlers[$eventType] = $handler;
    }

    public function getHandler(string $eventType): ?EventHandlerInterface
    {
        return $this->handlers[$eventType] ?? null;
    }

    private function registerHandlers(array $handlers): void
    {
        foreach ($handlers as $eventType => $handler) {
            $this->registerHandler($eventType, $handler);
        }
    }
}
