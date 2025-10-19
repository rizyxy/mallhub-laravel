<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class IndexSimilarProductsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        try {
            $response = Http::get(env('RECOMMENDER_SYSTEM_URL') . '/product/' . $request->route('productId') . '/similar');

            $similarProductIds = $response['data'];

            $similarProducts = Product::whereIn('id', $similarProductIds)
                ->with(['store', 'productImages'])
                ->get();


            return response()->json($similarProducts);
        } catch (\Throwable $th) {
            Log::error("An error has occured : " . $th);
        }
    }
}
