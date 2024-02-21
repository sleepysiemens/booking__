<?php

namespace App\Http\Controllers;

use App\Jobs\UpdateOrderStatus;
use App\Models\Order;
use App\Models\PartnershipApplication;
use DefStudio\Telegraph\Models\TelegraphChat;
use Illuminate\Http\Request;
use App\Services\AirportService;
use App\Models\BlogPost;
use App\Models\Review;
use Illuminate\Support\Facades\Session;


class MainController extends Controller
{
    public function index()
    {
        $order=Order::query()->latest()->first();
        UpdateOrderStatus::dispatch($order)->delay(now()->addSeconds(2));

        $airportService = new AirportService();
        $airports = $airportService->getAllAirports();

        $posts=BlogPost::query()->limit(4)->orderBy('created_at')->get();
        $reviews=Review::query()->where('is_published','=',1)->limit(3)->orderBy('created_at')->get();

        return view('main.index', compact('airports', 'posts', 'reviews'));
    }

    public function ref($ref_link)
    {
        $partner=PartnershipApplication::query()->where('link','=', $ref_link)->first();
        Session::put('ref_id', $partner->user_id);

        return redirect()->route('main.index');
    }

    public function tariff()
    {
        return view('tariff.index');
    }

    public function help()
    {
        return view('help.index');
    }

}
