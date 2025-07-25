<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cache;

class TGAuth extends Controller
{
    public function index($hash): RedirectResponse
    {
        if (Cache::has($hash)) {
            $user=Cache::get($hash);
            auth()->login($user);

            return redirect()->route('booking.index');
        }
        else
        {
            return redirect()->route('main.index');
        }
    }
}
