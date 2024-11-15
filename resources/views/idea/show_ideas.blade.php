@extends('layout.layout')

@section('content')
    <div class="row">
        <div class="col-3">
            @include('idea.left_sidebar')
        </div>
        <div class="col-6">
            <hr>
            @include('includes.success_msg')
            <div class="mt-3">
                @include('idea.shared.card_file')
            </div>
        </div>
        <div class="col-3">
            @include('idea.search')
            @include('idea.follow_box')
        </div>
    </div>
    </div>
@endsection
