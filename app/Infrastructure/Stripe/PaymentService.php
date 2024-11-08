<?php

declare(strict_types=1);

namespace App\Infrastructure\Stripe;

use Stripe\Charge;
use Stripe\Exception\ApiErrorException;
use Stripe\Stripe;

class PaymentService
{
    public function __construct()
    {
        Stripe::setApiKey(config('stripe.secret'));
    }

    /**
     * @throws ApiErrorException
     */
    public function createCharge($amount, $currency, $source, $description): Charge
    {
        return Charge::create([
            'amount' => $amount,
            'currency' => $currency,
            'source' => $source,
            'description' => $description,
        ]);
    }
}
