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
    public function start()
    {
        $reg_check=User::query()->where('tg_chat_id','=',$this->message->toArray()['chat']['id'])->exists();
        if($reg_check)
        {
            $user=User::query()->where('tg_chat_id','=',$this->message->toArray()['chat']['id'])->first();
        }
        else
        {
            $password=Str::random(8);

            $user =User::create([
                'name' => $this->message->toArray()['from']['first_name'],
                'surname' => $this->message->toArray()['from']['last_name'],
                'password' => Hash::make($password),
                'is_partner' => false,
                'tg_chat_id' => $this->message->toArray()['chat']['id'],
            ]);
        }

        $hash=Hash::make($user->created_at.date("YmdHis").$user->tg_chat_id);
        $hash=str_replace(['/'], '', $hash);
        Cache::put($hash, $user, now()->addMinutes(5));

        $this->reply(route('tg.auth',$hash));
    }

/*
    public function register($email)
    {
        $check=User::query()->where('tg_chat_id','=',$this->message->toArray()['chat']['id'])->exists();
        if(!$check)
        {
            $message=explode(' ',$this->message->toArray()['text']);

            if(isset($message[1]) and str_contains($message[1], '@'))
            {
                $email=$message[1];

                $is_registered=User::query()->where('email','=', $email)->exists();
                if($is_registered)
                {
                    $this->reply('Email уже используется');
                }
                else
                {
                    $password=Str::random(8);

                    $user =User::create([
                        'name' => $this->message->toArray()['from']['first_name'],
                        'surname' => $this->message->toArray()['from']['last_name'],
                        'email' => $email,
                        'password' => Hash::make($password),
                        'is_partner' => false,
                        'tg_chat_id' => $this->message->toArray()['chat']['id'],
                    ]);

                    if($user)
                        $this->reply('Успешная регистрация. Ваш пароль: '.$password);
                    else
                        $this->reply('Что-то пошло не так. Попробуйте еще раз' );
                }
            }
            else
                $this->reply('Введите /register email');
        }
        else
        {
            $this->reply('Вы уже зарегистрировались');
        }
    }

    public function login()
    {
        $check=User::query()->where('tg_chat_id','=',$this->message->toArray()['chat']['id'])->exists();
        if($check)
        {
            $user=User::query()->where('tg_chat_id','=',$this->message->toArray()['chat']['id'])->first();
            $hash=Hash::make($user->email.date("YmdHis").$user->tg_chat_id);
            $hash=str_replace(['/'], '', $hash);
            Cache::put($hash, $user, now()->addMinutes(5));

            $this->reply(route('tg.auth',$hash));
        }
        else
        {
            $this->reply('У вас еще нет аккаунта. Чтобы зарегистрироваться, введите /register email');
        }
    }*/

    protected function handleUnknownCommand(Stringable $text):void
    {
        $this->reply('Неизвестная команда');
    }
}
