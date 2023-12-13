<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function index()
    {
        $roles = ['admin', 'student', 'teacher', 'osis', 'ekskul'];
        $users = User::with('roles')->get();

        $filteredUsers = [];
        foreach ($roles as $role) {
            $filteredUsers[$role] = $users->filter(function ($user) use ($role) {
                return $user->roles->contains('name', $role);
            });
        }

        return view('admin.account.index', compact('filteredUsers'));
    }

    public function update()
    {

    }
}
