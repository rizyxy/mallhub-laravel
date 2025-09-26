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

            $products->through(function ($product) {
                // Manually map the data for the product and its images
                return [
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'description' => $product->description,
                    // Nested store data is fine as it was selected via Eager Loading
                    'store' => [
                        'id' => $product->store->id,
                        'name' => $product->store->name,
                    ],
                    // Transform productImages to include the full public URL
                    'product_images' => $product->productImages->map(function ($image) {
                        return [
                            'url' => asset('storage/' . $image->url), // 👈 Full URL here
                        ];
                    })->toArray(), // Convert the inner collection back to an array
                ];
            });

            return response($products);
        } catch (\Throwable $th) {
            Log::error($th);
            return response()->json([
                'error' => 'An error has occured'
            ]);
        }
    }
}
