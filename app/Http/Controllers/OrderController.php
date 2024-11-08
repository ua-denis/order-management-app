<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Domain\DTOs\OrderDTO;
use App\Domain\Services\OrderService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected OrderService $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function getOrderStatus(Request $request, string $chargeId): JsonResponse
    {
        $status = $this->orderService->getStatus($chargeId);
        return response()->json(new OrderDTO($chargeId, $status));
    }
}
