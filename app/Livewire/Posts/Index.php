<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;

#[Title('Posts')]
class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $keyword;

    public function render()
    {
        if ($this->keyword != null) {
            $posts = Post::where('title', 'like', '%' . $this->keyword . '%')->latest()->paginate(3);
        } else {
            $posts = Post::with('user')->latest()->paginate(3);
        }
        return view('livewire.posts.index', [
            'posts' => $posts
        ]);
    }
}
