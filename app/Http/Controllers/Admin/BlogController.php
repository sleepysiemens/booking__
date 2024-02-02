<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogPost;
use App\Models\BlogCategory;

class BlogController extends Controller
{
    public function index()
    {
        $categories=BlogCategory::all();
        $posts=BlogPost::all();
        return view('admin.blog.index',compact(['posts', 'categories']));
    }

    public function create()
    {
        $categories=BlogCategory::all();
        return view('admin.blog.create', compact(['categories']));
    }

    public function store(Request $request)
    {
        $data=request()->all();
        unset($data['_token']);

        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $fileName = $file->getClientOriginalName();

            // Перемещение файла в папку public/img/blog
            $file->move(public_path('img/blog'), $fileName);

            $data['image']=$fileName;
        }

        BlogPost::create($data);

        return redirect(route('admin.blog.index'));
    }

    public function edit(BlogPost $post)
    {
        $categories=BlogCategory::all();
        return view('admin.blog.edit', compact(['post', 'categories']));
    }

    public function update(BlogPost $post, Request $request)
    {
        $data=request()->all();
        unset($data['_method'], $data['_token']);

        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $fileName = $file->getClientOriginalName();

            // Перемещение файла в папку public/img/blog
            $file->move(public_path('img/blog'), $fileName);

            $data['image']=$fileName;
        }

        $post->update($data);
        return redirect(route('admin.blog.index'));

    }
}
