<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Infrastructure\Stripe\EventHandlerFactory;
use App\Infrastructure\Stripe\StripeWebhookVerifier;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class StripeWebhookController extends Controller
{
    private StripeWebhookVerifier $verifier;
    private EventHandlerFactory $factory;

    public function __construct(StripeWebhookVerifier $verifier, EventHandlerFactory $factory)
    {
        $this->verifier = $verifier;
        $this->factory = $factory;
    }

    public function handle(Request $request): JsonResponse
    {
        try {
            $event = $this->verifier->verify($request);

            if (!$event) {
                return response()->json(['error' => 'Invalid webhook signature'], Response::HTTP_BAD_REQUEST);
            }

            $handler = $this->factory->getHandler($event->type);

            if ($handler) {
                $handler->handle($event);
                return response()->json(['status' => 'processed'], Response::HTTP_OK);
            }

            Log::warning("Unhandled event type: {$event->type}");
            return response()->json(['status' => 'unhandled event'], 200);
        } catch (Exception $e) {
            Log::error("Stripe webhook error: {$e->getMessage()}");
            return response()->json(['error' => 'Webhook processing error'], Response::HTTP_BAD_REQUEST);
        }
    }
}
