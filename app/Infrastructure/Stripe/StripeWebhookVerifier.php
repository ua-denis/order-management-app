<?php

declare(strict_types=1);

namespace App\Infrastructure\Stripe;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Stripe\Event;
use Stripe\Webhook;

class StripeWebhookVerifier
{
    private mixed $secret;

    public function __construct()
    {
        $this->secret = config('stripe.secret');
    }

    public function verify(Request $request): ?Event
    {
        $payload = $request->getContent();
        $sigHeader = $request->header('Stripe-Signature');

        try {
            return Webhook::constructEvent($payload, $sigHeader, $this->secret);
        } catch (Exception $e) {
            Log::error("Stripe webhook verification failed: {$e->getMessage()}");
            return null;
        }
    }
}
