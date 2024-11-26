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

           $ideas = $ideas->search(request('search', ''));
        }

        $ideas = $ideas->orderBy('created_at', 'DESC')->paginate(5);


        return view("dashboard", [
            'ideas' => $ideas
        ]);
    }

}
