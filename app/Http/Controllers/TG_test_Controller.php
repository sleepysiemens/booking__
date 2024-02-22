<?php

namespace App\Http\Controllers;

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
        if ($order->created_at->addSeconds(1)->isPast())
        {
            $user=User::query()->where('id','=', $order->user_id)->first();
            $order->update(['is_confirmed'=>true]);

            if($user->tg_chat_id!=null)
            {
                $chat=TelegraphChat::query()->where('chat_id','=',$user->tg_chat_id)->first();

                $chat->message('Заказ №'.$order->id.' подтвержден')->keyboard(
                    Keyboard::make()->buttons(
                        [
                            Button::make('Посмотреть билет')->url(route('ticket.index',$order)),
                            Button::make('Скачать билет')->url(route('ticket.download',$order)),
                        ]
                    )
                )->send();
                dd($chat);
            }

            dd('succ');
        }
    }
}
