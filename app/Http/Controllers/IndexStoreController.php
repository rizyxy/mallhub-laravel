<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class IndexStoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        try {
            $query = Store::query();

            if ($request->has('floor_id')) {
                $query->where('floor_id', $request->query('floor_id'));
            }

            if ($request->has('name')) {
                $query->where('name', 'like', "%{$request->query('name')}%");
            }

            $query->with('floor:id,level');

            $stores = $query->cursorPaginate(10);

            return response()->json($stores);
        } catch (\Throwable $th) {
            Log::error($th);
            return response()->json([
                'error' => 'An error has occured'
            ]);
        }
    }
}
