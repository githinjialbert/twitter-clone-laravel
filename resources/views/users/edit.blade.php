@extends('layout.layout')

@section('content')
    <div class="row">
        <div class="col-3">
            @include('idea.left_sidebar')
        </div>
        <div class="col-6">
            @include('includes.success_msg')
            <div class="mt-3">
                @include('includes.profile_edit')
            </div>
            <hr>
            @forelse ($ideas as $idea)
                <div class="mt-3">
                    @include('includes.card_file')
                </div>
            @empty
                No results found.
            @endforelse
            <div class="mt-3">
                {{ $ideas->withQueryString()->links() }}
            </div>
        </div>
        <div class="col-3">
            @include('idea.search')
            @include('idea.follow_box')
        </div>
    </div>
    </div>
@endsection
