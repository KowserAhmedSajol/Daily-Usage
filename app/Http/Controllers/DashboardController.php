<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;

class DashboardController extends Controller
{
    public function index()
    {
        $types = Type::all();
        return view('dashboard',compact('types'));
    }
}
