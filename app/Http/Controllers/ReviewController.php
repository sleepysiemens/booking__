<?php

namespace App\Http\Controllers;

use Guzzle\Service\Resource\Model;
use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews=Review::query()->where('is_published','=',1)->get();
        return view('reviews.index', compact(['reviews']));
    }

    public function store()
    {
        $data=
            [
                'name'=>request()->name,
                'surname'=>request()->surname,
                'rating'=>request()->rating,
                'text'=>request()->text,
            ];
        Review::create($data);
        return redirect()->route('reviews.index');
    }
}
