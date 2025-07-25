<?php

namespace App\Telegram;

use App\Models\User;
use DefStudio\Telegraph\Handlers\WebhookHandler;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Stringable;
use Illuminate\Support\Facades\Cache;


class Handler extends WebhookHandler
{
    public function start(): void
    {
        $reg_check = User::query()->where('tg_chat_id','=',$this->message->toArray()['chat']['id'])->exists();

        if ($reg_check) {
            $user = User::query()->where('tg_chat_id','=',$this->message->toArray()['chat']['id'])->first();
        } else {
            $password = Str::random(8);

            $user = User::create([
                'name'       => $this->message->toArray()['from']['first_name'],
                'surname'    => $this->message->toArray()['from']['last_name'],
                'password'   => Hash::make($password),
                'is_partner' => false,
                'tg_chat_id' => $this->message->toArray()['chat']['id'],
            ]);
        }

        $hash = Hash::make($user->created_at . date("YmdHis").$user->tg_chat_id);
        $hash = str_replace(['/'], '', $hash);
        Cache::put($hash, $user, now()->addMinutes(5));

        $this->reply(route('tg.auth',$hash));
    }

    protected function handleUnknownCommand(Stringable $text): void
    {
        $this->reply('Неизвестная команда');
    }
}
