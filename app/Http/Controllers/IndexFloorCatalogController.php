<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class IndexFloorCatalogController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        try {

            $query = Store::query();

            $query = $query->where('floor_id', '=', $request->route('floorId'));

            $query = $query->with('floor');

            $stores = $query->cursorPaginate(10);

            return response()->json($stores);
        } catch (\Throwable $th) {
            Log::error('An error has occured when fetching stores : ' . $th);
        }
    }
}
