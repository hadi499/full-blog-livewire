<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Posts')]
class Index extends Component
{
    public function render()
    {
        $posts = Post::with('user')->latest()->get();
        return view('livewire.posts.index',[
            'posts' => $posts
        ]);
    }
}
