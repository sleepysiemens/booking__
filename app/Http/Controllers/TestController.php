<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\OldSeachService;
use Illuminate\Support\Facades\Http;


class TestController extends Controller
{
    public function __construct(OldSeachService $oldSeachService)
    {
        $this->OldSeachService = $oldSeachService;
    }

    public function test()
    {
        $result=$this->OldSeachService->get_search_link();

        dd($result);
    }

}
