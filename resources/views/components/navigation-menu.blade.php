<nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                @auth
                <x-nav-link :active="request()->routeIs('home')" href="{{route('home')}}">Home</x-nav-link>
                <x-nav-link :active="request()->routeIs('about')" href="{{route('about')}}">About</x-nav-link>
                <x-nav-link :active="request()->routeIs('posts.*')" href="{{route('posts.index')}}">Posts
                </x-nav-link>
                    
                @endauth
                
            </ul>
            <ul class="navbar-nav ms-auto me-3">
                @auth

                <li>
                    <form action="{{route('logout')}}" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item">Logout</button>
                    </form>
                </li>
                @else
                <li class="nav-litem">
                    <a class="nav-link" href="{{route('login')}}">Login</a>
                </li>
                @endauth
            </ul>
           
          

        </div>
    </div>
</nav>