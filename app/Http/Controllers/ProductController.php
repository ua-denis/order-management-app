<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Domain\Services\ProductService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index(Request $request): JsonResponse
    {
        $tenantId = app('currentTenant')->id;

        return response()->json($this->productService->listProducts($tenantId));
    }

    public function store(Request $request): JsonResponse
    {
        $tenantId = app('currentTenant')->id;
        $data = $request->only(['name', 'description', 'price', 'is_active']);
        $data['tenant_id'] = $tenantId;

        return response()->json($this->productService->createProduct($data));
    }
}
