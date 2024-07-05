<div class="px-3">
    <div>
        <h5 class="mb-3 ms-2">{{$total_comment}} Comments</h5>
    </div>
    <div class=" mb-4 card p-3">
        <form wire:submit.prevent="store" class="px-2">
            <div class="mb-3">
                <textarea wire:model.defer="body" rows="2" class="form-control @error('body')is-invalid @enderror"
                    placeholder="Tulis komentar..."></textarea>
                @error('body')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
      
       
    </div>
       
   @foreach ($comments as $comment)
   <div class="mb-3" wire:key="{{$comment->id}}">
       <div class="d-flex align-items-start">
           <img class="img-fluid rounded-circle me-2" width="40"
           src="https://cdn.cloudflare.steamstatic.com/steamcommunity/public/images/avatars/91/91a09746173fa3251cd6c1cce849d77d8444f816_full.jpg"
           alt="">
           <div>
               <div>
                   <span>{{$comment->user->name}}</span>
               <span>{{$comment->created_at}}</span>
               </div>
               <div class="mb-2 text-secondary">
                   {{$comment->body}}
               </div>
               <div>
                   <button class="btn" wire:click="selectReply({{$comment->id}})"><small><strong>Balas</strong></small></button>
                   @if (isset($comment->hasLike))
                   <button wire:click="like({{$comment->id}})" class="btn btn-sm btn-danger">
                       <i class="bi bi-heart-fill me-2"></i>({{$comment->totalLikes()}})
                   </button>
                   @else
                   <button wire:click="like({{$comment->id}})" class="btn btn-sm btn-dark">
                       <i class="bi bi-heart-fill me-2"></i>({{$comment->totalLikes()}})
                   </button>

                   @endif

               </div>
               <div >
                @if (isset($comment_id) && $comment_id == $comment->id)
              
                <form wire:submit.prevent="reply" class="my-4">
                    <div class="mb-3">
                        <textarea wire:model.defer="body2" rows="2" cols="50" class="form-control @error('body2')is-invalid @enderror"
                            placeholder="Tulis komentar..."></textarea>
                        @error('body2')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div>
                        <button type="submit" class="btn btn-warning btn-sm"><i class="bi bi-send"></i></button>
                    </div>
                </form>
            @endif
            </div> 
           </div>
       
        </div>
       
        
   </div>
   @if ($comment->childrens)
   @foreach ($comment->childrens as $item)
       <div class="d-flex align-items-start mb-3 ms-5">
        <img class="img-fluid rounded-circle me-2" width="40"
                src="https://cdn.cloudflare.steamstatic.com/steamcommunity/public/images/avatars/91/91a09746173fa3251cd6c1cce849d77d8444f816_full.jpg"
                alt="">
            <div>
                <div>
                    <span>{{$item->user->name}}</span>
                    <span>{{$item->created_at}}</span>
                </div>
                <div class="mb-2 text-secondary">
                    {{$item->body}}
                </div>
                <div>
                    <button class="btn" wire:click="selectReply({{$item->id}})"><small><strong>Balas</strong></small></button>
                    @if (isset($item->hasLike))
                    <button wire:click="like({{$item->id}})" class="btn btn-sm btn-danger">
                        <i class="bi bi-heart-fill me-2"></i>({{$item->totalLikes()}})
                    </button>
                    @else
                    <button wire:click="like({{$item->id}})" class="btn btn-sm btn-dark">
                        <i class="bi bi-heart-fill me-2"></i>({{$item->totalLikes()}})
                    </button>

                    @endif
                </div>
                <div>
                    @if (isset($comment_id) && $comment_id == $item->id)
                    <form wire:submit.prevent="reply" class="my-4">
                        <div class="mb-3">
                            <textarea wire:model.defer="body2" rows="2" cols="50"
                                class="form-control @error('body2')is-invalid @enderror"
                                placeholder="Tulis komentar..."></textarea>
                            @error('body2')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div>
                            <button type="submit" class="btn btn-warning btn-sm"><i class="bi bi-send"></i></button>
                        </div>
                    </form>
                    @endif

                </div>
               
            </div>
       </div>
   @endforeach
       
   @endif
       
   @endforeach
</div>
