<?php

namespace App\Http\Controllers;

use App\Models\Floor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class IndexFloorController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        try {
            $floors = Floor::all();

            return response()->json($floors);
        } catch (\Throwable $th) {
            Log::error('An error has occured when fetching floors : ' . $th);
        }
    }
}
