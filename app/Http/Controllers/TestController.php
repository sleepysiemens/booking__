<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nesk\Puphpeteer\Puppeteer;

class TestController extends Controller
{
    public function parseFlightInfo()
    {
        $url = 'https://search.jetradar.com/flights/OVB0602MOW13021';

        // Используем Puphpeteer для выполнения запроса с поддержкой JavaScript
        $puppeteer = new Puppeteer();
        $browser = $puppeteer->launch();
        $page = $browser->newPage();
        $page->goto($url);

        // Дождитесь, пока выполнится JavaScript (может потребоваться настройка времени ожидания)
        // Пример: $page->waitForTimeout(3000);

        // Получите содержимое страницы после выполнения JavaScript
        $html = $page->content();

        // Закройте браузер после использования
        $browser->close();

        dd($html);
    }
}
