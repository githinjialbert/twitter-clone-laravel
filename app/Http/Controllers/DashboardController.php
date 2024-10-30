<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;

class DashboardController extends Controller
{
    public function index() {

        $ideas = Idea::query();


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
