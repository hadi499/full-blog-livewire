<div class="row justify-content-center">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h3 class="text-center my-2">Form Registration</h3>
                <form class="px-3" wire:submit.prevent="register">
                    <div class="mb-4">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" wire:model="name">
                        @error('name') <span class="error">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" wire:model="email">
                        @error('email') <span class="error">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" wire:model="password">
                        @error('password') <span class="error">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="password_confirmation"
                            wire:model="password_confirmation">
                    </div>

                    <button type="submit" class="btn btn-primary">Register</button>
                </form>

            </div>
        </div>
    </div>
</div>