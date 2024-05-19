<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class TypeApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::where('user_id',Auth::id())->orderBy('created_at', 'desc')->get();
        return response()->json([
            "types" =>  $types,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Type::create([
            'uuid' => Str::uuid(),
            'user_id' => Auth::id(),
            'type' => $request->type,
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
