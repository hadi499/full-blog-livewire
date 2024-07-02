<div>
    {{-- <a wire:click="destroy" onclick="confirm('Are you sure remove this comment?') || event.stopImmediatePropagation()"
        class="btn btn-sm btn-danger">Delete</a> --}}
    <a wire:click="confirmDelete" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Delete</a>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Are you sure delete post ?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                    <h5 class="text-primary text-center">"{{$post->title}}" ?</h4>
                      
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                    <button type="button" class="btn btn-danger" wire:click='destroy'
                        data-bs-dismiss="modal">Ya</button>
                </div>
            </div>
        </div>
    </div>

</div>