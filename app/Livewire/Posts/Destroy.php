<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class Destroy extends Component
{

    public $post;
   
    public $delete;

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function confirmDelete()
    {
       
    }



    public function destroy()
    {
        if ($this->post->image) {
            Storage::delete($this->post->image);
        }
        $this->post->delete();

        session()->flash('success', 'Post has been deleted!');
        return redirect()->route('posts.index');
    }

    public function render()
    {
        return view('livewire.posts.destroy');
    }
}
