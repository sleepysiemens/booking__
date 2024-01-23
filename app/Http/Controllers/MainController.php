<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AirportService;


class MainController extends Controller
{
    public function index()
    {
        $airportService = new AirportService();

        $airports = $airportService->getAllAirports();
        //dd($airports);
        return view('main.index', compact('airports'));
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
    public function wait($stage)
    {
        return view('wait.index', compact(['stage']));
    }

    public function ticket()
    {
        return view('ticket.index');
    }
}
