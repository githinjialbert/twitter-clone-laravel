@extends('layout.layout')

@section('title', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-3">
            @include('idea.left_sidebar')
        </div>
        <div class="col-6">
            @include('includes.success_msg')
            @include('idea.shared.submit_tweet')
            <hr>
            @if (count($ideas) > 0)
                @forelse ($ideas as $idea)
                    <div class="mt-3">
                        @include('idea.shared.card_file')
                    </div>
                @empty
                    No results found.
                @endforelse
            @endif
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
