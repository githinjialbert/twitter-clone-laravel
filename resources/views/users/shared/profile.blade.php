<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:150px" class="me-3 avatar-sm rounded-circle" src="{{ $user->getImageUrl() }}"
                    alt="Mario Avatar">
                <div>
                    <h3 class="card-title mb-0"><a href="#"> {{ $user->name }}
                        </a></h3>
                    <span class="fs-6 text-muted">{{ $user->email }}</span>

                </div>
            </div>
            <div>
                @auth()
                    @if (Auth::id() === $user->id)
                        <a href="{{ route('users.edit', $user->id) }}">Edit</a>
                    @endif
                @endauth
            </div>
        </div>
        <div class="px-2 mt-4">
            <h5 class="fs-5"> Bio : </h5>
            <p class="fs-6 fw-light">
                {{ $user->bio }}
            </p>
            <div class="d-flex justify-content-start">
                <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-user me-1">
                    </span> {{ $user->followers()->count() }} Followers </a>
                <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-brain me-1">
                    </span> {{ $user->idea()->count() }} </a>
                <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-comment me-1">
                    </span> {{ $user->idea()->count() }} </a>
            </div>
            @auth
            @if (Auth::user()->id !== $user->id) {{-- Check if the logged-in user is not viewing their own profile --}}
                @if (Auth::user()->follows($user)) {{-- Check if the logged-in user is following the user --}}
                    <form method="POST" action="{{ route('users.unfollow', $user->id) }}" class="mt-3">
                        @csrf
                        <button class="btn btn-primary btn-sm"> Unfollow </button>
                    </form>
                @else
                    <form method="POST" action="{{ route('users.follow', $user->id) }}" class="mt-3">
                        @csrf
                        <button class="btn btn-primary btn-sm"> Follow </button>
                    </form>
                @endif
            @endif
        @endauth
        </div>
    </div>
</div>
