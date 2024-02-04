<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AirportService;
use App\Models\BlogPost;
use App\Models\Review;


class MainController extends Controller
{
    public function index()
    {
        $airportService = new AirportService();
        $airports = $airportService->getAllAirports();

        $posts=BlogPost::query()->limit(4)->orderBy('created_at')->get();
        $reviews=Review::query()->where('is_published','=',1)->limit(3)->orderBy('created_at')->get();

        return view('main.index', compact('airports', 'posts', 'reviews'));
    }

    public function test()
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
    public function wait($stage)
    {
        return view('wait.index', compact(['stage']));
    }

    public function ticket()
    {
        return view('ticket.index');
    }
}
