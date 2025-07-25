<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPost;
use App\Models\BlogCategory;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function index(): View
    {
        return view('blog.index');
    }
    public function show(BlogPost $post): View
    {
        if (! $post->exists) {
            abort(404);
        }

        $categories = BlogCategory::all();
        $common_posts = BlogPost::query()->limit(3)->get();
        $latest_posts = BlogPost::query()->limit(2)->orderBy('created_at')->get();

        return view('blog.show', compact(['post', 'categories', 'common_posts', 'latest_posts']));
    }
}
