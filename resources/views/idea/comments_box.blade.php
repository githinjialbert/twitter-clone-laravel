<div>
    <form action="{{ route('idea.comments.store', $idea->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <textarea name="content" class="fs-6 form-control" rows="1"></textarea>
        </div>
        <div>
            <button type="submit" class="btn btn-primary btn-sm"> Post Comment </button>
        </div>
    </form>
    <hr>
    @foreach ($idea->comments as $comment)
        <div class="d-flex align-items-start">
            @if ($comment->user)
                <!-- Use getImageUrl() only if user exists -->
                <img style="width:35px" class="me-2 avatar-sm rounded-circle" src="{{ $comment->user->getImageUrl() }}"
                    alt="{{ $comment->user->name }} Avatar">
            @else
                <!-- Use a default image directly if user is null -->
                <img style="width:35px" class="me-2 avatar-sm rounded-circle"
                    src="https://api.dicebear.com/6.x/fun-emoji/svg?seed=Guest" alt="Default Avatar">
            @endif

            <div class="w-100">
                <div class="d-flex justify-content-between">
                    <!-- Display user's name if exists, otherwise 'Guest' -->
                    <h6 class="">{{ $comment->user ? $comment->user->name : 'Guest' }}</h6>
                    <small class="fs-6 fw-light text-muted"> {{ $comment->created_at }}</small>
                </div>
                <p class="fs-6 mt-3 fw-light">
                    {{ $comment->content }}
                </p>
            </div>
        </div>
    @endforeach
</div>
