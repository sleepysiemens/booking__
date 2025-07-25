<?php

namespace App\Http\Controllers;

use Guzzle\Service\Resource\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\View\View;

class ReviewController extends Controller
{
    public function index(): View
    {
        $reviews = Review::query()->where('is_published','=',1)->get();
        return view('reviews.index', compact(['reviews']));
    }

    public function store(): RedirectResponse
    {
        $data = [
            'name'    => request()->name,
            'surname' => request()->surname,
            'rating'  => request()->rating,
            'text'    => request()->text,
        ];
        Review::query()->create($data);

        return redirect()->route('reviews.index');
    }
}
