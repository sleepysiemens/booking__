<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class TGAuth extends Controller
{
    public function index($hash)
    {
        if (Cache::has($hash))
        {
            $user=Cache::get($hash);
            auth()->login($user);
            return redirect()->route('profile.index');
        }
        else
        {
            return redirect()->route('main.index');
        }
    }
}
