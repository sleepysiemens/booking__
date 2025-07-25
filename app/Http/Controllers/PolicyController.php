<?php

namespace App\Http\Controllers;


use Illuminate\View\View;

class PolicyController extends Controller
{
    public function index(): View
    {
        return view('policy.index');
    }
}
