<div class="row justify-content-center">

        
        <div class="mb-4">
            <a wire:navigate class="text-decoration-none btn btn-dark" href="{{route('posts.create')}}">Create Post</a>

        </div>
        @foreach ($posts as $post)
        <div class="col-sm-12 col-md-8 col-lg-6 col-xl-4">
            <div class="card mb-4">
                <a class="text-decoration-none text-dark" href="{{route('posts.show', $post->slug)}}">
    
                    <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" height="300" alt="...">
                </a>
                <div class="card-body p-3">
                    <a  class="text-decoration-none text-dark" href="{{route('posts.show', $post->slug)}}">
                        <h4 class="">{{$post->title}}</h4>
                    </a>
                    <div class="mt-0">
                        <small>
                            <span><strong>{{$post->user->name}}, </strong></span>
                            <span>{{$post->created_at->diffForHumans()}}</span>
                        </small>
                    </div>
                    <p class="text-secondary">#{{$post->category->name}}</p>
                    <p>{{$post->excerpt}}</p>
    
                </div>
            </div>

        </div>

        @endforeach
 
</div>