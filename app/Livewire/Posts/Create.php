<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\Attributes\Title;
use Livewire\WithFileUploads;

#[Title('Create Post')]
class Create extends Component
{
    use WithFileUploads;

    public $title;
    public $slug;
    public $image;
    public $category_id;
    public $body;
    public $categories;

    public function mount()
    {
        $this->categories = Category::all();
    }

    protected $rules = [
        'title' => 'required|max:255',
        'slug' => 'required|unique:posts',
        'image' => 'image|file|max:1024|nullable',
        'category_id' => 'required',
        'body' => 'required'
    ];

    public function updatedTitle($value)
    {
        $this->slug = Str::slug($value);
    }

    public function store()
    {
        $validatedData = $this->validate();

        if ($this->image) {
            $validatedData['image'] = $this->image->store('post-images');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($this->body), 30);

        Post::create($validatedData);

        session()->flash('success', 'New post added!');
        return redirect()->route('posts.index');
    }

    public function render()
    {
        return view('livewire.posts.create');
    }
}
