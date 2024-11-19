<div>
    @auth
        <form
            action="{{ Auth::user()->likesIdea($idea) ? route('ideas.unlike', $idea->id) : route('ideas.like', $idea->id) }}"
            method="POST">
            @csrf
            <button type="submit" class="fw-light nav-link fs-6">
                <span class="{{ Auth::user()->likesIdea($idea) ? 'fas' : 'far' }} fa-heart me-1"></span>
                {{ $idea->likes_count }}
            </button>
        </form>
    @endauth
    @guest
        <a href="{{route('login')}}" class="fw-light nav-link fs-6">
            <span class="fas fa-heart me-1"></span>
            {{ $idea->likes_count }}
        </a>
    @endguest
</div>
