<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class IndexProductController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        try {
            $query = Product::query();

            if ($request->has('searchQuery')) {
                $searchQuery = $request->query('searchQuery');
                $query = $query->where('name', 'like', "%{$searchQuery}%");
            }

            $query = $query->with(['store.floor', 'productImages']);

            $products = $query->cursorPaginate(10);

            return response()->json($products);
        } catch (\Throwable $th) {
            Log::error("An error has occured when fetching products : " . $th);
        }
    }
}
