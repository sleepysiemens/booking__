<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class WaitController extends Controller
{
    public function index(): RedirectResponse|View
    {
        if (! isset($_COOKIE['order'])) {
            return redirect()->route('main.index');

        }

        setcookie('order', null);
        unset($_COOKIE['order']);

        return view('wait.index');
    }
}
