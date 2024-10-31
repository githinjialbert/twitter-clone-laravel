<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;
use Illuminate\Support\Facades\Auth;


class IdeaController extends Controller
{
    public function edit(Idea $idea) {

        if(Auth::id() !== $idea->user_id) {
            abort(404);
        }

        $editing = true;

        return view('idea.show_ideas', compact('idea','editing'));
    }

    public function update(Idea $idea) {

        if(Auth::id() !== $idea->user_id) {
            abort(404);
        }

        $validated = request()->validate([
            "content" => "required|min:10|max:500"
        ]);

        $idea->update($validated);

       return redirect()->route('idea.show', $idea->id)->with('success', 'Idea Updated Successfully');
    }

    public function show(Idea $idea) {
        return view('idea.show_ideas', compact('idea'));
    }

    public function store() {

        $validated = request()->validate([
            "content" => "required|min:10|max:500"
        ]);

        $validated['user_id'] = Auth::id();

        Idea::create($validated);

        return redirect()->route('dashboard')->with('success', 'Idea created successfully!');
    }


    public function destroy(Idea $idea) {

        if(Auth::id() !== $idea->user_id) {
            abort(404);
        }

       $idea->delete();

        return redirect()->route('dashboard')->with('success', 'Idea deleted successfully!');
    }
}
