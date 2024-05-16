<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function index()
    {
        return view('types.index');
    }
    public function check()
    {
        return view('types.check');
    }
}
