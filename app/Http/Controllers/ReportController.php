<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usage;
use App\Models\Income;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function index()
    {
        $usageAll = Usage::all();
        $total = new \stdClass;
        $total->totalUsage = $usageAll->sum('actual_amount');
        $total->actual_amount = $usageAll->sum('actual_amount');
        $total->estimated_amount = $usageAll->sum('estimated_amount');
        $usageAll = $usageAll->filter(function ($usage) {
            return $usage->created_at->isCurrentMonth();
        });
        $lastMonthTotal = new \stdClass;
        $lastMonthTotal->totalUsage = $usageAll->sum('actual_amount');
        $lastMonthTotal->actual_amount = $usageAll->sum('actual_amount');
        $lastMonthTotal->estimated_amount = $usageAll->sum('estimated_amount');
        

        $incomeAll = Income::all();
        $incomeTotal = new \stdClass;
        $incomeTotal->amount = $incomeAll->sum('amount');
        $incomeAll = $incomeAll->filter(function ($usage) {
            return $usage->created_at->isCurrentMonth();
        });
        $incomeLastMonthTotal = new \stdClass;
        $incomeLastMonthTotal->amount = $incomeAll->sum('amount');
        
        return view('reports.index',compact(
                                            'total',
                                            'lastMonthTotal',
                                            'incomeTotal',
                                            'incomeLastMonthTotal'
                                            ));
    }
    public function dateWiseDailyReport()
    {
        return view('reports.date-wise-daily-report');
    }
}
