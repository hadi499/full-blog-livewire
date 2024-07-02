<?php

namespace App\Livewire\Comments;

use App\Models\Post;
use App\Models\Comment;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;


class Index extends Component
{
   
    public $comment;
    public $post;
   
    public $body;
    public $body2;
    public $comment_id;
   
    public function mount(Post $post)
    {
        $this->post = $post;
       
    }

    // public function mount($id)
    // {
    //     $this->post = Post::find($id);
    // }

 

    public function store()
    {
        $this->validate(['body' => 'required']);
        $comment = Comment::create([
            'user_id' => Auth::user()->id,
            'post_id' => $this->post->id,
            'body' => $this->body
        ]);

        $this->body = NULL;    
       
   
        // return redirect()->route('posts.show', $this->post->slug);
    }

    public function selectReply($id)
    {
       
        $this->comment_id = $id;  
        $this->body2 = NULL;
    }
 
    public function reply()
    {
        $this->validate(['body2' => 'required']);
        $comment = Comment::find($this->comment_id);
        $comment = Comment::create([
            'user_id' => Auth::user()->id,
            'post_id' => $this->post->id,
            'body' => $this->body2,
            'comment_id' => $comment->comment_id ? $comment->comment_id : $comment->id
        ]);

        $this->body2 = NULL;
        $this->comment_id = NULL;
        // return redirect()->route('posts.show', $this->post->slug);
     
    }
  

    public function render()
    {
        // $comments = Comment::with('user')->where('post_id', $this->post->id)
        // ->orderBy('created_at', 'desc')->get();
        $comments = Comment::with('user', 'childrens')
                ->where('post_id', $this->post->id)
                ->whereNull('comment_id')
                ->orderBy('created_at', 'desc')
                ->get();
             
        $total_comment = Comment::where('post_id', $this->post->id)->count();

        return view('livewire.comments.index', [
            'comments' => $comments,
            'total_comment' => $total_comment
        ]);
    }
}
