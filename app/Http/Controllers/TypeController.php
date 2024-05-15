<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index()
    {
        return view('types.index');
    }
}
