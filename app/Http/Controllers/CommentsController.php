<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;


class CommentsController extends Controller
{
    public function store(Idea $idea) {

        $comment = new Comment();
        $comment->idea_id = $idea->id;
        $comment->user_id = Auth::id();
        $comment->content = request()->get('content');
        $comment->save();

        return redirect()->route('idea.show', $idea->id)->with('success', 'Comment submitted successfully.');

    }
}
