@auth()
<h4> Share Your Ideas </h4>
<div class="row">
    <form action="{{ route('idea.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <textarea name="content" class="form-control" id="content" rows="3"></textarea>
            @error('content')
                <span class="fs-6 text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="">
            <button type="submit" class="btn btn-dark btn-sm"> Share </button>
        </div>
    </form>
</div>
@endauth
@guest()
<h4>{{ __('language.share_your_ideas') }}</h4>
@endguest
