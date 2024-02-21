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
//use Illuminate\Support\Facades\Mail;


class UpdateOrderStatus implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $order;

    /**
     * Create a new job instance.
     */
    public function __construct(Order $order)
    {
        $this->order=$order;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        if ($this->order->created_at->addSeconds(1)->isPast())
        {
            $this->order->update(['is_confirmed'=>true]);
            $user=User::query()->where('id','=', $this->order->user_id)->first();

            if($user->tg_chat_id!=null)
            {
                $chat=TelegraphChat::query()->where('chat_id','=',$user->tg_chat_id)->first();
                $message=Telegraph::message('Заказ №'.$this->order->id.' подтвержден')->keyboard(
                    Keyboard::make()->buttons(
                        [
                            Button::make('Посмотреть билет')->url(route('ticket.index',$this->order)),
                            Button::make('Скачать билет')->url(route('ticket.download',$this->order)),
                        ]
                    )
                )->chat($chat)->send();
            }

            Log::info('UpdateBookingStatus выполнен');
        }
    }
}
