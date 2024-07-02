
<div class="row justify-content-center">
    <div class="col-md-6">
        
        <div class="card shadow-lg">
            <div class="card-body">
                <h3 class="text-center my-3">Login</h3>
                <form class="px-4" wire:submit="login">
                    <div class="mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input wire:model="email" type="text" class="form-control @error('email')is-invalid @enderror"
                            id="email">
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input wire:model="password" type="password"
                            class="form-control @error('password')is-invalid @enderror" id="password" />
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-primary">Log in</button>
                        <p class="mt-2 text-secondary"><small>Don't have account? <a href={{route('register')}}>Register</a></small></p>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
