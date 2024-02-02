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
    public function show()
    {
        return view('blog.show');
    }
}
