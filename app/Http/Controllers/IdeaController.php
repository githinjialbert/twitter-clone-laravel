<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;

class IdeaController extends Controller
{
    public function store() {

        request()->validate([
            "idea" => "required|min:10|max:500"
        ]);

        $idea = Idea::create([
            "content" => request()->get('idea', '')
        ]);

        $idea->save();

        return redirect()->route('dashboard')->with('success', 'Idea created successfully!');
    }
}
