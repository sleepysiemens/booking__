<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;


class ReviewController extends Controller
{
    public function index()
    {
        $reviews=Review::all();
        return view('admin.reviews.index', compact(['reviews']));
    }

    public function edit(Review $review)
    {
        return view('admin.reviews.edit', compact(['review']));
    }

    public function update(Review $review)
    {
        $data=request()->all();
        unset($data['_method'], $data['_token']);
        if(!isset($data['is_published']))
            $data['is_published']=0;

        $review->update($data);
        return redirect(route('admin.reviews.index'));
    }

    public function delete(Review $review)
    {
        $review->delete();
        return redirect(route('admin.reviews.index'));
    }
}
