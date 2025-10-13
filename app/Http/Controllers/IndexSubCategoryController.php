<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class IndexSubCategoryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        try {
            $query = SubCategory::query();

            $query = $query->where('category_id', '=', $request->route('categoryId'));

            $subCategories = $query->get();

            return response()->json($subCategories);
        } catch (\Throwable $th) {
            Log::error('An error has occured when fetching subcategories : ' . $th);
        }
    }
}
