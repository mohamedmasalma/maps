<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">

                <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                    src="https://api.dicebear.com/6.x/fun-emoji/svg?seed={{$idea->user->name}}" alt="Mario Avatar">
                <div>
                    <h5 class="card-title mb-0"><a href={{route("users.show",$idea->user->id)}}>{{$idea->user->name}}
                        </a></h5>

                </div>
            </div>
            <div>
                <form action={{ route('ideas.destroy', $idea->id) }} method="post">
                    @csrf
                    @method('delete')
                    <a href={{ route('ideas.show', $idea->id) }}>view</a>

                    @if ($idea->user->id===Auth::id())
                       <a class="mx-2" href={{ route('ideas.edit', $idea->id) }}> edit</a>
                    <button class="btn btn-danger btn-sm" type="submit">x</button>
                    @endif


                </form>
            </div>

        </div>
    </div>
    <div class="card-body">
        @if ($editing ?? false)
            <form action={{ route('ideas.update', $idea->id) }} method="POST">
                @csrf

                <textarea name="idea" class="form-control" id="idea" rows="3">{{ $idea->comment }}</textarea>
                @error('idea')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="">
                    <button type="submit" class="btn btn-dark mt-2"> update </button>
                </div>
            </form>
        @else
            <p class="fs-6 fw-light text-muted">
                {{ $idea->comment }}
            </p>
        @endif

        <div class="d-flex justify-content-between">
            <div>
                <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1">
                    </span> {{ $idea->likes }} </a>
            </div>
            <div>
                <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                {{ $idea->created_at }} </span>
            </div>
        </div>

        @include('shared.comment')


    </div>
</div>
