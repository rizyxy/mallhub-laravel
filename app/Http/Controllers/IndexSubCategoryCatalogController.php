<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class IndexSubCategoryCatalogController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        try {
            $query = Product::query();

            $query = $query->where('sub_category_id', '=', $request->route('subCategoryId'));

            $query = $query->with(['store.floor', 'productImages']);

            $products = $query->cursorPaginate(10);

            return response()->json($products);
        } catch (\Throwable $th) {
            Log::error("An error has occured when fetching subcategory catalog : " . $th);
        }
    }
}
