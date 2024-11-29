<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateIdeaRequest;
use App\Http\Requests\UpdateIdeaRequest;
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

    public function update(UpdateIdeaRequest $request, Idea $idea) {

        if(Auth::id() !== $idea->user_id) {
            abort(404);
        }

        $validated = $request->validated();

        $idea->update($validated);

       return redirect()->route('idea.show', $idea->id)->with('success', 'Idea Updated Successfully');
    }

    public function show(Idea $idea) {
        return view('idea.show_ideas', compact('idea'));
    }

    public function store(CreateIdeaRequest $request) {

        $validated = $request->validated();

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
