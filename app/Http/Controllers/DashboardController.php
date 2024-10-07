<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index () {
        $users = [
            [
                "name" => "Albert",
                "email" => "albert234@gmail.com",
                "password" => "",
                "age" => 24
            ],
            [
                "name" => "John",
                "email" => "john$54Q@gmail.com",
                "password" => "",
                "age" => 34
            ],
            [
                "name" => "Rebecca",
                "email" => "rebecca456@gmail.com",
                "password" => "",
                "age" => 26
            ]
        ];
        return view(
            "dashboard",
            ["users" => $users]
    );
    }
}
