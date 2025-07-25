<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(): RedirectResponse
    {
        if (auth()->user() !== null) {
            if (auth()->user()->is_admin === 1) {
                return redirect()->route('admin.index');

            }

            if (isset($_COOKIE['order'])) {
                return redirect()->route('booking.get');
            }

            return redirect()->route('profile.index');
        }

        return redirect(route('main.index'));
    }
}
