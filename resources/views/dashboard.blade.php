@extends('layout.layout')

@section('content')
    <div class="row">
        <div class="col-3">
            @include('idea.left_sidebar')
        </div>
        <div class="col-6">
            @include('includes.success_msg')
            @include('includes.submit_tweet')
            <hr>
            @if (count($ideas) > 0)
                @foreach ($ideas as $idea)
                    <div class="mt-3">
                        @include('includes.card_file')
                    </div>
                @endforeach
            @else
                No results found.
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
