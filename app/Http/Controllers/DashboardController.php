<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;
use App\Models\Usage;
use Carbon\Carbon;

class DashboardController extends Controller
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
        
        return view('dashboard',compact('total','lastMonthTotal'));
    }
}
