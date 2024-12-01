<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;


class SearchController extends Controller
{
    public function index(Request $request)
    {
        $level = $request->input('level', []);
        $query = Post::query();

        if (!empty($level)) {
                    $query->whereIn('level', $level);
                }

        $posts = $query->get();
        

        return view('main.main', ['posts' => $posts]);
    }
}
