<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IncomeTypeController extends Controller
{
    public function index()
    {
        return view('income_types.index');
    }
}
