<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('main.index');
    }

    public function search()
    {
        return view('search.index');
    }

    public function booking()
    {
        return view('booking.index');
    }

    public function profile()
    {
        return view('profile.index');
    }

    public function tariff()
    {
        return view('tariff.index');
    }

    public function help()
    {
        return view('help.index');
    }

    public function blog()
    {
        return view('blog.index');
    }
    public function blog_show()
    {
        return view('blog.show');
    }
}
