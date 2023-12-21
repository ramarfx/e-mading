<?php

namespace App\Http\Controllers\Auth;

use App\Models\Role;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request as FacadesRequest;

// use Illuminate\Validation\Validator::validateNumber();

class RegisterController extends Controller
{
    public function create(): View
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email:dns', 'max:255'],
            'password' => ['required'],
        ]);

        $validated['password'] = bcrypt($validated['password']);

        $user = User::create($validated);

        $role = Role::where('name', 'siswa')->first();

        $user->roles()->attach($role);

        Auth::login($user);

        return redirect(route('dashboard'));
    }
}
