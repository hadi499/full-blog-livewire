<div class="row justify-content-center ">
    <div class="col-md-8">
        <div class="card mb-3 shadow">
            <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" height="500" alt="...">

            <div class="card-body">

                <h4 class="card-title" style="margin-bottom: 0.1rem;">{{$post->title}}</h4>
                <p style="margin-bottom: 0.1rem;">Author: {{$post->user->name}}</p>

                <p class="card-text"><small class="text-body-secondary">
                        {{$post->created_at->diffForHumans()}}</small></p>
                <div class="mb-3">
                    
                    {!! $post->body !!}
                    
                </div>
                    <div class="d-flex gap-2">
                        <a href="{{ route('posts.edit', ['slug' => $post->slug]) }}" class="btn btn-sm btn-primary">Edit</a>
                        <livewire:posts.destroy :post="$post" />
                        {{-- @livewire('destroy', ['post' => $post]) --}}

                    </div>

            </div>
        
               
        </div>
        <div class="card shadow p-2">   
            {{-- @livewire('comments.index', ['id', $post->id])        --}}
            
            <livewire:comments.index :post="$post">
        </div>
        <div class="mt-4 d-flex justify-content-end">
            <a class="btn btn-sm btn-outline-dark " href="/posts">Back to posts</a>

        </div>
    </div>
</div>