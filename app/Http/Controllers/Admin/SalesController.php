<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\PartnershipApplication;
use App\Models\Promocode;
use App\Models\User;
use App\Models\Withdraw;

class SalesController extends Controller
{
    public function index()
    {
        $promocodes=Promocode::all();
        return view('admin.sales.index', compact(['promocodes']));
    }

    public function create()
    {
        return view('admin.sales.create');

    }

    public function store()
    {
        $data=request()->all();
        unset($data['_token']);

        Promocode::create($data);

        return redirect()->route('admin.promocodes.index');
    }
}
