<?php

namespace App\Telegram;

use App\Models\User;
use DefStudio\Telegraph\Handlers\WebhookHandler;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Stringable;

class Handler extends WebhookHandler
{
    public function start()
    {
        $this->reply('Данный бот предназначен для регистрации и получения уведомлений с сайта tripavia.com. чтобы зарегистрироваться, введите команду /register ваш email');
    }

    public function register($email)
    {
        $check=User::query()->where('tg_chat_id','=',$this->message->toArray()['chat']['id'])->exists();
        if(!$check)
        {
            $message=explode(' ',$this->message->toArray()['text']);

            if($message[1]!=null and str_contains($message[1], '@'))
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

    protected function handleUnknownCommand(Stringable $text):void
    {
        $this->reply('Неизвестная команда');
    }
}
