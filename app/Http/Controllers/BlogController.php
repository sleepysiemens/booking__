<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPost;

class BlogController extends Controller
{
    public function index($page)
    {
        $offset=($page--)*10;
        $posts=BlogPost::query()->limit(9)->offset($offset)->get();
        $pages=BlogPost::count();
        return view('blog.index', compact(['posts']));
    }
    public function show(BlogPost $blog)
    {
        return view('blog.show', compact(['blog']));
    }
}
