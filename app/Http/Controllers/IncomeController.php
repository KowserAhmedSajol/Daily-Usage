<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IncomeType;

class IncomeController extends Controller
{
    public function index()
    {
        $incomeTypes = IncomeType::all();
        return view('income.index',compact('incomeTypes'));
    }
}
