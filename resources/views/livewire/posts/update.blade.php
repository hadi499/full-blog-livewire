<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card px-3 shadow-lg">
            <div class="card-body">
                <h3 class="text-center my-2">Update Post</h3>
                <form wire:submit.prevent="update">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" id="title" wire:model="title" class="form-control">
                        @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug</label>
                        <input type="text" id="slug" wire:model="slug" class="form-control" readonly disabled>
                        @error('slug') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" id="image" wire:model="image" class="form-control">
                        @if ($oldImage)
                        <img src="{{ asset('storage/' .$oldImage) }}" alt="Current Image" class="img-fluid mt-2"
                            width="200">
                        @endif
                        @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select class="form-select" id="category_id" wire:model="category_id" name="category_id">
                            <option value="">Choose category</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    {{-- <div class="mb-3">
                        <label for="body" class="form-label">Body</label>
                        <textarea id="body" wire:model="body" class="form-control"></textarea>
                        @error('body') <span class="text-danger">{{ $message }}</span> @enderror
                    </div> --}}
                    <div class="mb-3" wire:ingnore >
                    <label for="body" class="form-label">Body</label>
                    {{-- <textarea id="body" type="hidden" wire:model="body" class="form-control"></textarea> --}}
                    <input id="body" type="hidden" name="body" value="{{$this->body}}">
                    <trix-editor input="body"></trix-editor>
                    @error('body') <span class="text-danger">{{ $message }}</span> @enderror
                   
            </div> 
                <button type="submit" class="btn btn-primary my-2">Update</button>
            </form>
        </div>
    </div>
</div>
</div>

@script
<script>
    let trixEditor = document.getElementById("body")

        addEventListener("trix-blur", function (event) {
            @this.
            set('body', trixEditor.getAttribute('value'))
        })
</script>
@endscript