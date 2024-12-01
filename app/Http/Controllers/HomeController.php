<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use Illuminate\Support\Facades\App;
use GuzzleHttp\Client;

class HomeController extends Controller
{
    
    public function index(){
        $user = Auth::user();
        $posts = Post::all()->sortByDesc('created_at');

        $currentLocale = App::getLocale();


        return view('main.home', compact('user', 'posts', 'currentLocale'));
    }

    public function changeLocale($locale){
        session(['locale' => $locale]);

        App::setLocale($locale);

        
        return redirect()->back();
    }
}