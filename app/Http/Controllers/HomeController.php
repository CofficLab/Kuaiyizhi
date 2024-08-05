<?php

namespace App\Http\Controllers;

use App\Models\Idea;

class HomeController extends Controller
{
    public function index()
    {
        $ideas = Idea::where('parent_id', config('app.root_name'))
            ->orderBy('priority', 'asc')
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        return view('home', compact('ideas'));
    }
}
