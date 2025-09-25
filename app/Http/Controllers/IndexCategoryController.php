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
            $query = Category::query();

            $categories = $query->cursorPaginate(10);

            return response()->json($categories);
        } catch (\Throwable $th) {
            Log::error($th);
            return response()->json([
                'error' => 'An error has occured'
            ]);
        }
    }
}
