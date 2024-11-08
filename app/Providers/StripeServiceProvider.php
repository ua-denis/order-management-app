<?php

namespace App\Providers;

use App\Domain\Handlers\Stripe\ChargeFailedHandler;
use App\Domain\Handlers\Stripe\ChargeSucceededHandler;
use App\Infrastructure\Stripe\EventHandlerFactory;
use App\Infrastructure\Stripe\StripeWebhookVerifier;
use Illuminate\Support\ServiceProvider;

class StripeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(StripeWebhookVerifier::class, function ($app) {
            return new StripeWebhookVerifier();
        });

        $this->app->singleton(EventHandlerFactory::class, function ($app) {
            $factory = new EventHandlerFactory();
            $factory->registerHandler('charge.succeeded', $app->make(ChargeSucceededHandler::class));
            $factory->registerHandler('charge.failed', $app->make(ChargeFailedHandler::class));
            return $factory;
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
