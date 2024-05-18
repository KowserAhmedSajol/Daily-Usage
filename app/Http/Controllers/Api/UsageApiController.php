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
    public function index()
    {
        $usages = Usage::with('type')->where('user_id',Auth::id())->orderBy('created_at', 'desc')->get();
        return response()->json([
            "usages" =>  $usages,
        ], 200);
    }
    public function store(Request $request)
    {
        // dd($request->date);
        Usage::create([
            'uuid' => Str::uuid(),
            'user_id' => Auth::id(),
            'title' => $request->title,
            'actual_amount' => $request->actual_amount,
            'estimated_amount' => $request->estimated_amount,
            'type_id' => $request->type,
            'date' => $request->date,
            'important' => $request->important,
            'remark' => $request->remark,
        ]);
        return response()->json([
            "msg" =>  'Successfull',
        ], 200);
    }
}
