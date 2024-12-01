<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Laravel\Prompts\alert;

class RoleController extends Controller
{
    public function update(Request $request, int $id)
    {
        $specialUser = User::findOrFail($id);

        $request->validate([
            'role' => 'required|string|max:50',
        ]);

        if($request->role == 'admin'){
            if($specialUser == 'teacher'){
                $specialUser->teacher->delete();
            }

            $specialUser->role = $request->role;
            $specialUser->save();

            return redirect('account');
        }

        /** @var \App\Models\User $user **/
        $specialUser->role = $request->role;
        $specialUser->save();

        if ($specialUser->role == 'teacher') {
            Teacher::create(['user_id' => $specialUser->id]);
        } 
        elseif ($specialUser->role == 'student') {
            $specialUser->teacher->delete();
        }

       



        return redirect('account');
    }
}
