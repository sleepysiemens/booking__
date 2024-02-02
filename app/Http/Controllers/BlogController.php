<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPost;
use App\Models\BlogCategory;

class BlogController extends Controller
{
    public function index($page)
    {
        $offset=($page-1)*10;
        $posts=BlogPost::query()->limit(9)->offset($offset)->get();
        $categories=BlogCategory::all();

        $page_cnt=BlogPost::count();
        $page_cnt=(intdiv($page_cnt,8))+1;
        //dd($posts);

        return view('blog.index', compact(['posts', 'page', 'categories','page_cnt']));
    }
    public function show(BlogPost $post)
    {
        if (!$post->exists) {
            abort(404);
        }

        $categories=BlogCategory::all();
        $common_posts=BlogPost::query()->limit(3)->get();
        $latest_posts=BlogPost::query()->limit(2)->orderBy('created_at')->get();

        return view('blog.show', compact(['post', 'categories', 'common_posts', 'latest_posts']));
    }
}
