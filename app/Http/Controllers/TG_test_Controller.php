<?php

namespace App\Http\Controllers;

use App\Jobs\UpdateOrderStatus;
use App\Models\Order;
use App\Models\User;
use DefStudio\Telegraph\Keyboard\Button;
use DefStudio\Telegraph\Keyboard\Keyboard;
use DefStudio\Telegraph\Models\TelegraphChat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TG_test_Controller extends Controller
{
    public function index($order)
    {
        $order=Order::query()->where('id','=',$order)->first();
        UpdateOrderStatus::dispatch($order->id)->delay(now()->addSeconds(1));
    }
}
