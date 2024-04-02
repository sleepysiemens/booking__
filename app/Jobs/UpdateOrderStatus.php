<?php

namespace App\Jobs;

use App\Mail\OrderNotifications;
use App\Models\Order;
use App\Models\User;
use DefStudio\Telegraph\Facades\Telegraph;
use DefStudio\Telegraph\Keyboard\Button;
use DefStudio\Telegraph\Keyboard\Keyboard;
use DefStudio\Telegraph\Models\TelegraphChat;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

//use Illuminate\Support\Facades\Mail;


class UpdateOrderStatus implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $order;

    /**
     * Create a new job instance.
     */
    public function __construct($order)
    {
        $this->order=Order::query()->where('id','=',$order)->first();
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        if ($this->order->created_at->addSeconds(29)->isPast())
        {
            $user=User::query()->where('id','=', $this->order->user_id)->first();
            $this->order->update(['is_confirmed'=>true]);

            if($user->tg_chat_id!=null)
            {
                $chat=TelegraphChat::query()->where('chat_id','=',$user->tg_chat_id)->first();

                $chat->message('Заказ №'.$this->order->number.' подтвержден')->keyboard(
                    Keyboard::make()->buttons(
                        [
                            Button::make('Посмотреть билет')->url(route('ticket.index',$this->order)),
                            Button::make('Скачать билет')->url(route('ticket.download',$this->order)),
                        ]
                    )
                )->send();
            }

            if($user->email!=null)
            {
                Mail::to($user->email)->send(new OrderNotifications($this->order->number));

            }

            Log::info('UpdateBookingStatus выполнен');
        }
    }
}
