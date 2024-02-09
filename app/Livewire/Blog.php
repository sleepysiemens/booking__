<?php

namespace App\Livewire;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use Livewire\Component;
use Livewire\WithPagination;

class Blog extends Component
{
    use WithPagination;

    public $category_=-1;
    public function initializeItems()
    {
    }

    public function render()
    {
        //dd(BlogPost::all());
        if($this->category_!=-1)
        {
            $posts=BlogPost::query()->where('category', '=', $this->category_)->paginate(9);
        }
        else
        {
            $posts=BlogPost::paginate(9);
        }

        $categories=BlogCategory::all();

        return view('livewire.blog', compact(['posts', 'categories']));
    }
}
