<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                    src="https://api.dicebear.com/6.x/fun-emoji/svg?seed=Mario" alt="Mario Avatar">
                <div>
                    <h5 class="card-title mb-0"><a href="#"> Mario
                        </a></h5>
                </div>
            </div>
            <div>
                <form method="post" action="{{ route('idea.destroy', $idea->id) }}">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger btn-sm">X</button>
                    <a class="mx-2" href="{{ route('idea.edit', $idea->id) }}">Edit</a>
                    <a href="{{ route('idea.show', $idea->id) }}">View</a>
                </form>
            </div>
        </div>
    </div>
    <div class="card-body">

        {{-- Editing ideas --}}
        @if ($editing ?? false)
            <h4> Share yours ideas </h4>
            <div class="row">
                <form action="{{ route('idea.update', $idea->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <textarea name="content" class="form-control" id="content" rows="3">{{ $idea->content }}</textarea>
                        @error('content')
                            <span class="fs-6 text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="">
                        <button type="submit" class="btn btn-dark btn-sm"> Update </button>
                    </div>
                </form>
            </div>
        @else
            <p class="fs-6 fw-light text-muted">
                {{ $idea->content }}
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
        @include('idea.comments_box')
    </div>
</div>
