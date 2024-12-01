<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Post;
use Illuminate\Support\Facades\App;


class MainController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if(!$user){
            return redirect('home');
        }

        $currentLocale = App::getLocale();
        

        return view('main.main', compact('user', 'currentLocale'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $currentLocale = App::getLocale();

        $level = $request->input('level');
        $category = $request->input('category');
        $query = $request->input('query');
        $cost = $request->input('cost');


        $posts = Post::query();

        if (!empty($level)) {
            $posts = $posts->where('level', 'LIKE', "%$level%");
        }
        if (!empty($category)) {
            $posts = $posts->where('category', 'LIKE', "%$category%");
        }
        if (!empty($cost)) {
            $posts = $posts->where('cost', '<=', $cost);
        }

        if (!empty($query)) {
            $posts = $posts->where('title', 'LIKE', "%$query%")
                        ->orwhere('text', 'LIKE', "%$query%");
        }
        
        $posts = $posts->get();


        return view('main.main', compact('user','posts', 'currentLocale'));
    }
}
