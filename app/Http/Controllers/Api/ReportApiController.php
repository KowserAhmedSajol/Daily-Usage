<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usage;
use Illuminate\Support\Facades\Auth;

class ReportApiController extends Controller
{
    public function dateWiseDailyReport(Request $request)
    {
        $date = Carbon::createFromFormat('d M, Y', $request->date)->toDateString();
        $usages =  Usage::with('type')
        ->where('user_id',Auth::id())
        ->whereDate('created_at', $date)
        ->orderBy('created_at', 'desc')
        ->get();
        return response()->json([
            "usages" =>  $usages,
        ], 200);
    }

}
