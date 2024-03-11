<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Price;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use App\Services\AirportService;


class MainController extends Controller
{
    public function index()
    {
        $price=Price::query()->first();

        if(Cache::has('ticket_view'))
        {
            $ticket_view=Cache::get('ticket_view');
        }
        else
        {
            Cache::put('ticket_view','all');
            $ticket_view='all';
        }

        return view('admin.index', compact(['price', 'ticket_view']));
    }

    public function save_price()
    {
        $request=\request()->all();
        unset($request['_token']);
        unset($request['_method']);

        $price=Price::query()->first();
        $price->update($request);

        return redirect()->route('admin.index');
    }

    public function save_ticket()
    {
        Cache::put('ticket_view',request()->ticket_view);
        return redirect()->route('admin.index');
    }
}
