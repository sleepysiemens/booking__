<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Price;
use Illuminate\Http\Request;
use App\Services\AirportService;


class MainController extends Controller
{
    public function index()
    {
        $price=Price::query()->first();
        return view('admin.index', compact(['price']));
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
}
