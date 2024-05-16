<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usage;
use App\Models\Type;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UsageApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usages = Usage::with('type')->orderBy('created_at', 'desc')->get();
        return response()->json([
            "usages" =>  $usages,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd();
        Usage::create([
            'uuid' => Str::uuid(),
            'user_id' => Auth::id(),
            'title' => $request->title,
            'actual_amount' => $request->actual_amount,
            'estimated_amount' => $request->estimated_amount,
            'type_id' => $request->type,
            'remark' => $request->remark,
        ]);
        return response()->json([
            "msg" =>  'Successfull',
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
