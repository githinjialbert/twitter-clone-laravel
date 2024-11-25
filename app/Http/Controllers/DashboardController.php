<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;
use App\Models\User;

class DashboardController extends Controller
{
    public function index() {

        $ideas = Idea::withCount('likes');

        if (request()->has('search')) {
            $searchTerm = request()->get('search', '');
            $ideas->where('content', 'like', '%' . $searchTerm . '%');
        }


        $topUsers = User::withCount('idea')->orderBy('idea_count', 'DESC')->limit(5);

        $ideas = $ideas->orderBy('created_at', 'DESC')->paginate(5);


        return view("dashboard", [
            'ideas' => $ideas,
            'topUsers' => $topUsers
        ]);
    }

}
