<?php

namespace App\Livewire;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class Blog extends Component
{
    use WithPagination;

    public int $category_ = -1;
    public function initializeItems() {}

    public function render(): View
    {
        if ($this->category_ !== -1) {
            $posts=BlogPost::query()->where('category', '=', $this->category_)->paginate(9);
        } else {
            $posts = BlogPost::query()->paginate(9);
        }

        $categories = BlogCategory::all();

        return view('livewire.blog', compact(['posts', 'categories']));
    }
}
