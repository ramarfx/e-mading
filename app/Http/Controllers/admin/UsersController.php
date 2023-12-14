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
        //ambil seluruh user dan urutkan berdasarkan role
        $users = User::join('role_user', 'users.id', '=', 'role_user.user_id')
            ->join('roles', 'role_user.role_id', '=', 'roles.id')
            ->orderByRaw("
            CASE
                WHEN roles.name = 'admin' THEN 1
                WHEN roles.name = 'teacher' THEN 2
                WHEN roles.name = 'student_council' THEN 3
                WHEN roles.name = 'ekskul' THEN 4
                WHEN roles.name = 'student' THEN 5
                ELSE 6
            END
        ")
        ->with('roles')
        ->get();
        $roles = Role::all();

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
