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

            if ($request->has('store_id')) {
                $query->where('store_id', $request->query('store_id'));
            }

            if ($request->has('sub_category_id')) {
                $query->where('sub_category_id', $request->has('sub_category_id'));
            }

            if ($request->has('name')) {
                $query->where('name', 'like', "%{$request->query('name')}%");
            }

            $query->with('productImages');

            $query->with('store:id,name');

            $products = $query->cursorPaginate(10);

            return response($products);
        } catch (\Throwable $th) {
            Log::error($th);
            return response()->json([
                'error' => 'An error has occured'
            ]);
        }
    }
}
