<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfirmTicketController extends Controller
{
    public function index()
    {
        return view('confirm_ticket.index');
    }
}
