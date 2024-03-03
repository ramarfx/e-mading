<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;
use Ramsey\Uuid\Guid\Fields;

class UsersController extends Controller
{
    public function index()
    {
        //ambil seluruh user
        $users = User::query()
            ->with('roles')
            ->get();
        $roles = Role::all();

        // return $users[0]->roles->first()->name;


        return view('admin.account.index', compact('users', 'roles'));
    }

    public function update(Request $request)
    {
        $userId = $request->input('user_id');
        $roleId = $request->input('role_id');

        $user = User::find($userId);
        $user->roles()->sync([$roleId]);

        return back();
    }
}
