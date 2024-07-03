<?php

namespace App\Livewire\Posts;

use Livewire\Component;
use App\Models\Category as ModelsCategory;

class Category extends Component
{
    public $category;
    public $posts;
    public $categories;

    public function mount($slug)
    {
        $this->category = ModelsCategory::where('slug', $slug)->firstOrFail();
        $this->posts = $this->category->posts;
        $this->categories = ModelsCategory::all();
    }

    public function render()
    {       
     
        return view('livewire.posts.category',[
            'category' => $this->category,
            'posts' => $this->posts,
            'categories' => $this->categories
        ]);
    }
}
