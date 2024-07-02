<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use App\Models\Comment;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Detail Post')]
class Show extends Component
{
    public $slug;
    public $post;
    public Comment $comment;

    public function mount($slug)
    {
        $this->slug = $slug;
        $this->post = Post::with('user')->where('slug', $slug)->firstOrFail();
    }
  

    public function render()
    {
        
        return view('livewire.posts.show',[
            'post' => $this->post,
            
        ]);
    }
}
