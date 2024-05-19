<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\IncomeType;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class IncomeTypeApiController extends Controller
{
    public function index()
    {
        $types = IncomeType::where('user_id',Auth::id())->orderBy('created_at', 'desc')->get();
        return response()->json([
            "types" =>  $types,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        IncomeType::create([
            'uuid' => Str::uuid(),
            'user_id' => Auth::id(),
            'income_type' => $request->income_type,
        ]);
        return response()->json([
            "msg" =>  'Successfull',
        ], 200);
    }
}
