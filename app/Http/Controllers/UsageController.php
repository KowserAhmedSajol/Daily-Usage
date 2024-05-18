<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;

class UsageController extends Controller
{
    public function index()
    {
        $types = Type::all();
        return view('expence.index',compact('types'));
    }
}
