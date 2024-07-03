<div class="row justify-content-center">        
        
        @foreach ($posts as $post)
        <div class="col-sm-12 col-md-8 col-lg-6 col-xl-4">
            <div class="card mb-4">
                <a class="text-decoration-none text-dark" href="{{route('posts.show', $post->slug)}}">
    
                    @if ($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" height="300" alt="...">
                    
                    @else
                    <img src="{{ asset('image/no-image.jpg') }}" class="card-img-top" height="300" alt="...">
                   
                    @endif
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
                    {{-- <p class="text-secondary"># <a href="/posts/categories/{{$post->category->slug}}">{{$post->category->name}}</a></p> --}}
                    <p class="text-secondary"># <a href="{{route('posts.category', $post->category->slug)}}">{{$post->category->name}}</a></p>
                    <p>{{$post->excerpt}}</p>
    
                </div>
            </div>

        </div>

        @endforeach
 
</div>