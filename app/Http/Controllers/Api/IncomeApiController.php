<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Income;
use App\Models\Type;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class IncomeApiController extends Controller
{
    public function index()
    {
        $incomes = Income::with('income_type')->where('user_id',Auth::id())->orderBy('created_at', 'desc')->get();
        return response()->json([
            "incomes" =>  $incomes,
        ], 200);
    }
    public function store(Request $request)
    {
        Income::create([
            'uuid' => Str::uuid(),
            'user_id' => Auth::id(),
            'title' => $request->title,
            'amount' => $request->amount,
            'income_type_id' => $request->income_type_id,
            'date' => $request->date,
            'remark' => $request->remark,
        ]);
        return response()->json([
            "msg" =>  'Successfull',
        ], 200);
    }
}
