<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $ideas = $user->idea()->paginate(5);
        return view('users.show', compact('user', 'ideas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $editing = true;
        $ideas = $user->idea()->paginate(5);
        return view('users.edit', compact('user', 'editing', 'ideas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User $user)
    {
        $validated = request()->validate([
            'name' => 'required|min:5|max:45',
            'bio' => 'nullable|min:3|max:251',
            'image' => 'image'
        ]);

        if (request('image')) {
            $imagePath = request('image')->store('profile', 'public');
            $validated['image'] = $imagePath;
        }

        $user->update($validated);
        return redirect()->route('profile');
    }

    public function p_updates() {
        return $this->show(Auth::user());
    }
}
