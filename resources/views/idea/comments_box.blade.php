<div>
    <!-- Comment Form -->
    <form action="{{ route('idea.comments.store', $idea->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <textarea name="content" class="fs-6 form-control" rows="1" placeholder="Write a comment..."></textarea>
        </div>
        <div>
            <button type="submit" class="btn btn-primary btn-sm">Post Comment</button>
        </div>
    </form>

    <!-- Comments Section -->
    @forelse ($idea->comments as $comment)
        <div class="d-flex align-items-start my-3">
            <!-- Avatar -->
            <img style="width:35px" class="me-2 avatar-sm rounded-circle"
                src="{{ $comment->user ? $comment->user->getImageUrl() : 'https://api.dicebear.com/6.x/fun-emoji/svg?seed=Guest' }}"
                alt="{{ $comment->user ? $comment->user->name : 'Guest' }} Avatar">

            <!-- Comment Details -->
            <div class="w-100">
                <div class="d-flex justify-content-between">
                    <h6 class="mb-0">{{ $comment->user ? $comment->user->name : 'Guest' }}</h6>
                    <small class="fs-6 fw-light text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                </div>
                <p class="fs-6 mt-2 fw-light">
                    {{ $comment->content }}
                </p>
            </div>
        </div>
    @empty
        <!-- No Comments -->
        <div class="d-flex align-items-start">
            <p class="fs-6 mt-3 fw-light">
                No comments yet. Be the first to share your thoughts!
            </p>
        </div>
    @endforelse
</div>
