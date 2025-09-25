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
            $request->validate([
                'category_id' => 'required'
            ]);

            $query = SubCategory::query();

            $subCategories = $query->get();

            return response()->json($subCategories);
        } catch (\Throwable $th) {
            Log::error($th);
            return response()->json([
                'error' => 'An error has occured'
            ]);
        }
    }
}
