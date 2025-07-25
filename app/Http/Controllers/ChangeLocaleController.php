<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class ChangeLocaleController extends Controller
{
    public function change_locale($lang): RedirectResponse
    {
        App::setLocale($lang);
        Session::put('locale', $lang);

        return redirect()->back();
    }
}
