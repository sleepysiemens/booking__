<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        if(auth()->user() !== null)
        {
            if(auth()->user()->is_admin==1)
                return redirect()->route('admin.index');
            else
            {
                if(isset($_COOKIE['order']))
                    return redirect()->route('booking.get');
                else
                    return redirect()->route('profile.index');

            }
        }

        else
        return redirect(route('main.index'));
    }
}
