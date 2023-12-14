<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->get();
        $roles = Role::all();

        return view('admin.account.index', compact('users', 'roles'));
    }

    public function update(Request $request)
    {
        $user = User::find($request->user_id);
        $user->roles()->sync([$request->role_id]);

        return back();
    }
}
