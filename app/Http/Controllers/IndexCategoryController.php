<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class IndexCategoryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        try {
            $categories = Category::all();

            return response()->json($categories);
        } catch (\Throwable $th) {
            Log::error('An error has occured when fetching categories : ' . $th);
        }
    }
}
