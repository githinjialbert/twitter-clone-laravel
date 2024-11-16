<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;

class FeedController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $ideas = Idea::with('user:id,name,image', 'comments.user');


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
