<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function index()
    {
        $user = Auth::user();

        if($user->role == 'admin'){
            $allUsers = User::all();
            $allPosts = Post::all();

            return view('main.account', compact('user', 'allUsers', 'allPosts'));
        }
        elseif($user->role == 'teacher'){
            $allPosts = Post::all()->where('teacher_id', '==', $user->teacher->id);

            return view('main.account', compact('user', 'allPosts'));
        }
        else{
            return view('main.account', compact('user'));
        }
        
    }
    public function update(Request $request, int $id)
    {
        $user = User::findOrFail($id);
        

        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'phone_number' => 'nullable|string|max:20',
        ]);


        /** @var \App\Models\User $user **/
        $id = $user->id;
        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->phone_number = $request->input('phone_number');

        $user->save();

        
        return redirect('account');
    }

    public function editLesson(Request $request, int $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'level' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'cost' => 'required|numeric',
            'text' => 'string',
        ]);

        $post = Post::find($id);

        $post->title = $request->input('title');
        $post->level = $request->input('level');
        $post->category = $request->input('category');
        $post->cost = $request->input('cost');
        $post->text = $request->input('text');
        $post->save();


        return redirect()->back()->with('success', 'Post was successfuly updated');
    }

    public function createLesson(Request $request, int $id)
    {
        $user = Auth::user();

        $request->validate([
            'title' => 'required|string|max:255',
            'level' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'cost' => 'required|numeric',
            'text' => 'nullable|string',
        ]);


        $post = new Post();

        $post->title = $request->input('title');
        $post->level = $request->input('level');
        $post->category = $request->input('category');
        $post->cost = $request->input('cost');
        $post->text = $request->input('text');
        $post->teacher_id = $user->teacher->id;
        $post->save();


        return redirect()->back()->with('success', 'Post was successfuly created');
    }
    
    public function deleteUser(int $id)
    {
        $userForDeleting = User::findOrFail($id);
        $userForDeleting->delete();


        return redirect()->back();
    }
    
    public function deletePost(int $id)
    {
        $postForDeleting = Post::findOrFail($id);
        $postForDeleting->delete();

        return redirect()->back();
    }
    
}