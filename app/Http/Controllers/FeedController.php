<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FeedController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        $user = Auth::user();

        $followingIDs = $user->followings()->pluck('user_id');

        $ideas = Idea::with('user:id,name,image', 'comments.user')->whereIn('user_id', $followingIDs);


        if (request()->has('search')) {
            $searchTerm = request()->get('search', '');
            $ideas->where('content', 'like', '%' . $searchTerm . '%');
        }


        $ideas = $ideas->orderBy('created_at', 'DESC')->paginate(5);


        return view("dashboard", [
            'ideas' => $ideas
        ]);
    }
}
