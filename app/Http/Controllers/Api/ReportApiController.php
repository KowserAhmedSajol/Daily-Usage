<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReportApiController extends Controller
{
    public function dateWiseDailyReport(Request $request)
    {
        // $date = Carbon::createFromFormat('d M, Y', $request->date)->toDateString();
        // dd($date);
        $usages =  Usage::with('type')
        ->where('user_id',Auth::id())
        ->where('date', $request->date)
        ->orderBy('created_at', 'desc')
        ->get();
        return response()->json([
            "usages" =>  $usages,
        ], 200);
    }

    public function monthWiseReport(Request $request)
    {
        
       
        $startDate = Carbon::createFromDate($request->year, $request->month, 1)->startOfMonth();
        $endDate = Carbon::createFromDate($request->year, $request->month, 1)->endOfMonth();
        
        $usageData = Usage::where('user_id',Auth::id())
        ->select(
            DB::raw("DATE_FORMAT(STR_TO_DATE(date, '%d %b, %Y'), '%Y-%m-%d') as date"),
            DB::raw("SUM(actual_amount) as total_actual_amount"),
            DB::raw("SUM(estimated_amount) as total_estimated_amount")
        )
        ->whereBetween(DB::raw("STR_TO_DATE(date, '%d %b, %Y')"), [$startDate, $endDate])
        ->groupBy(DB::raw("DATE_FORMAT(STR_TO_DATE(date, '%d %b, %Y'), '%Y-%m-%d')"))
        ->get();
        
        return response()->json([
            "usages" =>  $usageData,
        ], 200);
    }

}
